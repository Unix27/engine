<?php

namespace App\Models;

use App\Helpers\DBTool;
use App\Helpers\Number;
use App\Helpers\RemoveFromString;
use App\Helpers\UrlGen;
use App\Models\Scopes\FromActivatedCategoryScope;
use App\Models\Scopes\LocalizedScope;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ReviewedScope;
use App\Models\Traits\CountryTrait;
use App\Observer\PostObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use Larapen\Admin\app\Models\Crud;
use Larapen\Feed\FeedItem;
use Larapen\LaravelDistance\Distance;
use Spatie\Feed\Feedable;


class Post extends BaseModel implements Feedable
{
	use Crud, CountryTrait, Notifiable;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
	protected $appends    = ['created_at_ta'];
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	public $timestamps = true;
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'country_code',
		'user_id',
		'category_id',
		'post_type_id',
		'title',
		'title_en',
		'description',
		'description_en',
		'tags',
		'price',
		'negotiable',
		'contact_name',
		'email',
		'phone',
		'phone_hidden',
		'address',
		'city_id',
		'lat',
		'lon',
		'ip_addr',
		'visits',
		'tmp_token',
		'email_token',
		'phone_token',
		'verified_email',
		'verified_phone',
		'reviewed',
		'featured',
		'archived',
		'archived_at',
		'deletion_mail_sent_at',
		'fb_profile',
		'partner',
		'created_at',
        'variant_id',
	];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];


	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	protected static function boot()
	{
		parent::boot();
		
		Post::observe(PostObserver::class);
		
		static::addGlobalScope(new FromActivatedCategoryScope());
		static::addGlobalScope(new VerifiedScope());
		static::addGlobalScope(new ReviewedScope());
		static::addGlobalScope(new LocalizedScope());
	}

	public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function routeNotificationForMail()
	{
		return $this->email;
	}
	
	public function routeNotificationForNexmo()
	{
		$phone = phoneFormatInt($this->phone, $this->country_code);
		$phone = setPhoneSign($phone, 'nexmo');
		
		return $phone;
	}
	
	public function routeNotificationForTwilio()
	{
		$phone = phoneFormatInt($this->phone, $this->country_code);
		$phone = setPhoneSign($phone, 'twilio');
		
		return $phone;
	}

    public static function getFeedItems()
    {
//        $postsPerPage = (int)config('settings.listing.items_per_page', 50);

        if (
            request()->has('d')
            || config('plugins.domainmapping.installed')
        ) {
            $countryCode = config('country.code');
            if (!config('plugins.domainmapping.installed')) {
                if (request()->has('d')) {
                    $countryCode = request()->input('d');
                }
            }

            $posts = Post::where('country_code', $countryCode)
                ->unarchived()
                ->where('price', '>', 0)
//              ->take($postsPerPage)
                ->orderByDesc('id')
                ->get();
        } else {
            $posts = Post::unarchived()
                ->whereHas('products', function($q){
                    $q->where('total_avail_quantity', '>=', 10);
                })
                ->where('price', '>', 0)
//                ->take($postsPerPage)
                ->orderByDesc('id')->get();
        }

        return $posts;
    }

    public function toFeedItem()
    {
        $title = RemoveFromString::minus_words($this->title, ['Sexy', 'sexy']);
        $summary = str_limit(str_strip(strip_tags($this->description)), 5000);
//        $summary = transformDescription($this->description);
        $link = UrlGen::postUri($this);
        if ($this->pictures()->count() > 0) {
            $postImg = $this->pictures()->first()->filename ? imgUrl($this->pictures()->first()->filename, 'large') : $this->pictures()->first()->product_picture_url;
        } else {
            $postImg = imgUrl(config('larapen.core.picture.default'));
        }
        $products = $this->getProducts();
        $bestSellerProduct = $products->shift();

        return FeedItem::create()
            ->id($this->id)
            ->title(RemoveFromString::escape_xml( \Illuminate\Support\Str::limit($title, 97), true))
            ->category(RemoveFromString::escape_xml($this->category->name, true))
            ->summary(RemoveFromString::escape_xml($summary))
            ->updated($this->updated_at)
            ->link($link)
            ->enclosure($postImg)
            ->price($bestSellerProduct->discount ? currency_format($bestSellerProduct->max_amount) : currency_format($bestSellerProduct->min_activity_amount ? $bestSellerProduct->min_activity_amount : $bestSellerProduct->min_amount))
            ->salePrice( $bestSellerProduct->discount ? currency_format($bestSellerProduct->min_activity_amount) : '')
            ->author($this->contact_name);
    }

    public function getTitleHtml()
	{
		$out = '';
		
		$post = self::find($this->id);
		$out  .= getPostUrl($post);
		$out  .= '<br>';
		$out  .= '<small>';
		$out  .= $this->pictures->count() . ' ' . trans('admin::messages.pictures');
		$out  .= '</small>';
		
		return $out;
	}
	
	public function getPictureHtml()
	{
		// Get ad URL
		$url = url(UrlGen::postUri($this));
		
		$style = ' style="width:auto; max-height:90px;"';
		// Get first picture
		if ($this->pictures->count() > 0) {
			foreach ($this->pictures as $picture) {
				$url = localUrl($picture->post->country_code, UrlGen::postPath($this));
				$out = '<img src="' . $picture->filename ? imgUrl($picture->filename, 'small') : $picture->product_picture_url . '" data-toggle="tooltip" title="' . $this->title . '"' . $style . '>';
//				$out = '<img src="' . $picture->filename ? imgUrl($picture->filename, 'small') : $picture->product_picture_url . '" data-toggle="tooltip" title="' . $this->title . '"' . $style . '>';
				break;
			}
		} else {
			// Default picture
			$out = '<img src="' . imgUrl(config('larapen.core.picture.default'), 'small') . '" data-toggle="tooltip" title="' . $this->title . '"' . $style . '>';
		}
		
		// Add link to the Ad
		$out = '<a href="' . $url . '" target="_blank">' . $out . '</a>';
		
		return $out;
	}
	
	public function getUserNameHtml()
	{
		if (isset($this->user) and !empty($this->user)) {
			$url     = admin_url('users/' . $this->user->getKey() . '/edit');
			$tooltip = ' data-toggle="tooltip" title="' . $this->user->name . '"';
			
			return '<a href="' . $url . '"' . $tooltip . '>' . $this->contact_name . '</a>';
		} else {
			return $this->contact_name;
		}
	}
	
	public function getCityHtml()
	{
		if (isset($this->city) and !empty($this->city)) {
			return '<a href="' . UrlGen::city($this->city) . '" target="_blank">' . $this->city->name . '</a>';
		} else {
			return $this->city_id;
		}
	}
	
	public function getReviewedHtml()
	{
		return ajaxCheckboxDisplay($this->{$this->primaryKey}, $this->getTable(), 'reviewed', $this->reviewed);
	}


    public function getProducts()
    {
        return $this->products->sortBy('min_amount');
    }

	/*
	|--------------------------------------------------------------------------
	| QUERIES
	|--------------------------------------------------------------------------
	*/
    /**
     * Get Latest or Sponsored Posts
     *
     * @param int $limit
     * @param string $type (latest OR sponsored)
     * @param int $offset
     * @return array
     */
	public static function getLatestOrSponsored($limit = 20, $type = 'latest', $offset = 0)
	{
		// Select fields
		$select = [
			'tPost.id',
			'tPost.country_code',
			'tPost.category_id',
			'tPost.post_type_id',
			'tPost.title',
			'tPost.price',
			'tPost.city_id',
			'tPost.featured',
			'tPost.created_at',
			'tPost.reviewed',
			'tPost.verified_email',
			'tPost.verified_phone',
			'tPayment.package_id',
			'tPackage.lft',
            'count(tProduct.id) as prouctCnt',
		];
		
		// GroupBy fields
		$groupBy = [
			'tPost.id',
            'tPayment.package_id',
            'tProduct.id',
		];
		
		// If the MySQL strict mode is activated, ...
		// Append all the non-calculated fields available in the 'SELECT' in 'GROUP BY' to prevent error related to 'only_full_group_by'
		if (env('DB_MODE_STRICT')) {
			$groupBy = $select;
		}
		
		$paymentJoin        = '';
		$sponsoredCondition = '';
		$productsJoin = '';
		$sponsoredOrder     = '';
		if ($type == 'sponsored') {
			$paymentJoin        .= 'INNER JOIN ' . DBTool::table('payments') . ' AS tPayment ON tPayment.post_id=tPost.id AND tPayment.active=1' . "\n";
			$paymentJoin        .= 'INNER JOIN ' . DBTool::table('packages') . ' AS tPackage ON tPackage.id=tPayment.package_id' . "\n";
			$sponsoredCondition = ' AND tPost.featured = 1';
			$sponsoredOrder     = 'tPackage.lft DESC, ';
		} else {
			// $paymentJoin .= 'LEFT JOIN ' . DBTool::table('payments') . ' AS tPayment ON tPayment.post_id=tPost.id AND tPayment.active=1' . "\n";
			$latestPayment = "(SELECT MAX(id) lid, post_id FROM " . DBTool::table('payments') . " WHERE active=1 GROUP BY post_id) latestPayment";
			$paymentJoin   .= 'LEFT JOIN ' . $latestPayment . ' ON latestPayment.post_id=tPost.id AND tPost.featured=1' . "\n";
			$paymentJoin   .= 'LEFT JOIN ' . DBTool::table('payments') . ' AS tPayment ON tPayment.id=latestPayment.lid' . "\n";
			$paymentJoin   .= 'LEFT JOIN ' . DBTool::table('packages') . ' AS tPackage ON tPackage.id=tPayment.package_id' . "\n";
		}

        $productsJoin .= 'LEFT JOIN ' . DBTool::table('products') . ' AS tProduct ON tProduct.post_id = tPost.id' . "\n";
		$productsCondition = ' AND tProduct.active = 1 AND tProduct.total_avail_quantity > 0';

		$reviewedCondition = '';
		if (config('settings.single.posts_review_activation')) {
			$reviewedCondition = ' AND tPost.reviewed = 1';
		}

		$sql      = 'SELECT DISTINCT ' . implode(',', $select) . '
                FROM ' . DBTool::table('posts') . ' AS tPost
                INNER JOIN ' . DBTool::table('categories') . ' AS tCategory ON tCategory.id=tPost.category_id AND tCategory.active=1
                ' . $paymentJoin . '
                ' . $productsJoin . '
                WHERE tPost.country_code = :countryCode AND tProduct.translation_lang = :translationLang                        
                	AND (tPost.verified_email=1 AND tPost.verified_phone=1)
                	AND tPost.archived!=1 ' . $reviewedCondition . $sponsoredCondition . $productsCondition . '
                GROUP BY ' . implode(',', $groupBy) . '
                ORDER BY ' . $sponsoredOrder . 'tPost.created_at DESC
                LIMIT '  . (int)$offset . ' ,'.(int)$limit;
		$bindings = [
			'countryCode' => config('country.code'),
            'translationLang' => config('app.locale'),
		];
		
		// Get Posts
		$posts = DB::select(DB::raw($sql), $bindings);
		
		// Transform the collection attributes
		$posts = collect($posts)->map(function ($post) {
			$post->title = mb_ucfirst($post->title);
			
			return $post;
		})->toArray();
		
		return $posts;
	}
	
	/**
	 * Get similar Posts (Posts in the same Category)
	 *
	 * @param int $limit
	 * @return array
	 */
	public function getSimilarByCategory($limit = 12)
	{
		$posts = [];
        $offset = request()->get('page', 0);
        $limit = request()->get('limit', $limit);
        if($offset) {
            $offset = ($offset-1) * $limit;
        }

        // Get the sub-categories of the current ad parent's category
		$similarCatIds = [];
		if (!empty($this->category)) {
			if ($this->category->tid == $this->category->parent_id) {
				$similarCatIds[] = $this->category->tid;
			} else {
				if (!empty($this->category->parent_id)) {
					$similarCatIds   = Category::trans()->where('parent_id', $this->category->parent_id)->get()
						->keyBy('tid')
						->keys()
						->toArray();
					$similarCatIds[] = (int)$this->category->parent_id;
				} else {
					$similarCatIds[] = (int)$this->category->tid;
				}
			}
		}
		
		// Get ads from same category
		if (!empty($similarCatIds)) {
			if (count($similarCatIds) == 1) {
				$similarPostSql = 'AND tPost.category_id=' . ((isset($similarCatIds[0])) ? (int)$similarCatIds[0] : 0) . ' ';
			} else {
				$similarPostSql = 'AND tPost.category_id IN (' . implode(',', $similarCatIds) . ') ';
			}
			$reviewedCondition = '';
			if (config('settings.single.posts_review_activation')) {
				$reviewedCondition = ' AND tPost.reviewed = 1';
			}
			$sql      = 'SELECT DISTINCT tPost.* ' . '
				FROM ' . DBTool::table('posts') . ' AS tPost
				LEFT JOIN ' . DBTool::table('users') . ' AS tUser ON tUser.id = tPost.user_id
				WHERE tPost.country_code = :countryCode ' . $similarPostSql . '
					AND (tPost.verified_email=1 AND tPost.verified_phone=1)
					AND tPost.archived!=1
					AND tPost.deleted_at IS NULL ' . $reviewedCondition . '
					AND tPost.id != :currentPostId
				ORDER BY tPost.id DESC
				LIMIT '.(int)$offset.', '.(int)$limit;
			$bindings = [
				'countryCode'   => config('country.code'),
				'currentPostId' => $this->id,
			];
			
			try {
				$posts = DB::select(DB::raw($sql), $bindings);
			} catch (\Exception $e) {
				return $posts;
			}
		}
		
		// Append the Posts 'uri' attribute
		$posts = collect($posts)->map(function ($post) {
			$post->title = mb_ucfirst($post->title);
			
			return $post;
		})->toArray();
		
		// Randomize the Posts
		$posts = collect($posts)->shuffle()->toArray();
		
		return $posts;
	}
	
	/**
	 * Get Posts in the same Location
	 *
	 * @param int $distance
	 * @param int $limit
	 * @return array
	 */
	public function getSimilarByLocation($distance, $limit = 20)
	{
		$posts = [];
		
		if (empty($this->city)) {
			return $posts;
		}
		
		if (!is_numeric($distance) || $distance < 0) {
			$distance = 0;
		}
		
		$bindings = [];
		
		// Get ads from same location (with radius)
		$reviewedCondition = '';
		if (config('settings.single.posts_review_activation')) {
			$reviewedCondition = ' AND tPost.reviewed = 1';
		}
		
		// Use the Cities Extended Searches
		config()->set('distance.functions.default', config('settings.listing.distance_calculation_formula'));
		config()->set('distance.countryCode', config('country.code'));
		
		// Init. Distance SQL vars
		$distSelectSql  = Distance::select('tPost.lon', 'tPost.lat', ':longitude', ':latitude');
		$distWhereSql   = '';
		$distHavingSql  = '';
		$distOrderBySql = '';
		
		if ($distSelectSql) {
			$distHavingSql  = Distance::having($distance);
			$distOrderBySql = Distance::orderBy('ASC');
			
			$bindings['longitude'] = $this->city->longitude;
			$bindings['latitude']  = $this->city->latitude;
		} else {
			$distWhereSql = 'tPost.city_id = ' . $this->city->id;
		}
		
		if (!empty($distSelectSql)) {
			$distSelectSql = ', ' . $distSelectSql;
		}
		if (!empty($distWhereSql)) {
			$distWhereSql = ' AND ' . $distWhereSql;
		}
		if (!empty($distHavingSql)) {
			$distHavingSql = 'HAVING ' . $distHavingSql;
		}
		if (!empty($distOrderBySql)) {
			$distOrderBySql = $distOrderBySql . ', ';
		}
		
		// SQL Query
		$sql = 'SELECT DISTINCT tPost.*' . $distSelectSql . '
			FROM ' . DBTool::table('posts') . ' AS tPost
			INNER JOIN ' . DBTool::table('categories') . ' AS tCategory ON tCategory.id=tPost.category_id AND tCategory.active=1
			LEFT JOIN ' . DBTool::table('users') . ' AS tUser ON tUser.id = tPost.user_id
			WHERE tPost.country_code = :countryCode
				AND (tPost.verified_email=1 AND tPost.verified_phone=1)
				AND tPost.archived!=1  ' . $reviewedCondition . '
				AND tPost.id != :currentPostId
				AND tUser.blocked != 1
				AND tUser.closed != 1
				' . $distWhereSql . '
			' . $distHavingSql . '
			ORDER BY ' . $distOrderBySql . 'tPost.id DESC
			LIMIT 0,' . (int)$limit;
		
		$bindings['countryCode']   = config('country.code');
		$bindings['currentPostId'] = $this->id;
		
		// Get Posts
		try {
			$posts = DB::select(DB::raw($sql), $bindings);
		} catch (\Exception $e) {
			return $posts;
		}
		
		// Append the Posts 'uri' attribute
		$posts = collect($posts)->map(function ($post) {
			$post->title = mb_ucfirst($post->title);
			
			return $post;
		})->toArray();
		
		// Randomize the Posts
		$posts = collect($posts)->shuffle()->toArray();
		
		return $posts;
	}
	
	/**
	 * Count sub-categories posts
	 * NOTE: Please don't cache this query since posts can be published by non-admin users.
	 *
	 * @return array|\Illuminate\Support\Collection
	 */
	public static function countByCategories()
	{
		$sql      = 'SELECT sc.id, c.parent_id, count(*) as total' . '
				FROM ' . DBTool::table('posts') . ' as a
				INNER JOIN ' . DBTool::table('categories') . ' as sc ON sc.id=a.category_id AND sc.active=1
				INNER JOIN ' . DBTool::table('categories') . ' as c ON c.id=sc.parent_id AND c.active=1
				WHERE a.country_code = :countryCode AND (a.verified_email=1 AND a.verified_phone=1) AND a.archived!=1 AND a.deleted_at IS NULL
				GROUP BY sc.id';
		$bindings = [
			'countryCode' => config('country.code'),
		];
		$cats     = DB::select(DB::raw($sql), $bindings);
		$cats     = collect($cats)->keyBy('id');
		
		return $cats;
	}
	
	/**
	 * Count parent categories posts
	 * NOTE: Please don't cache this query since posts can be published by non-admin users.
	 *
	 * @return array|\Illuminate\Support\Collection
	 */
	public static function countByParentCategories()
	{
		$sql1     = 'SELECT c.id as id, count(*) as total' . '
                FROM ' . DBTool::table('posts') . ' as a
                INNER JOIN ' . DBTool::table('categories') . ' as c ON c.id=a.category_id AND c.active=1
                WHERE a.country_code = :countryCode AND (a.verified_email=1 AND a.verified_phone=1) AND a.archived!=1 AND a.deleted_at IS NULL
                GROUP BY c.id';
		
		$sql2     = 'SELECT c.id as id, count(*) as total' . '
                FROM ' . DBTool::table('posts') . ' as a
                INNER JOIN ' . DBTool::table('categories') . ' as sc ON sc.id=a.category_id AND sc.active=1
                INNER JOIN ' . DBTool::table('categories') . ' as c ON c.id=sc.parent_id AND c.active=1
                WHERE a.country_code = :countryCode AND (a.verified_email=1 AND a.verified_phone=1) AND a.archived!=1 AND a.deleted_at IS NULL
                GROUP BY c.id';
		
		$sql      = 'SELECT cat.id, SUM(total) as total' . '
                FROM ((' . $sql1 . ') UNION ALL (' . $sql2 . ')) cat
                GROUP BY cat.id';
		
		$bindings = [
			'countryCode' => config('country.code'),
		];
		$cats     = DB::select(DB::raw($sql), $bindings);
		$cats     = collect($cats)->keyBy('id');
		
		return $cats;
	}
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function postType()
	{
		return $this->belongsTo(PostType::class, 'post_type_id', 'translation_of')->where('translation_lang', config('app.locale'));
	}
	
	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'translation_of')->where('translation_lang', config('app.locale'));
	}
	
	public function city()
	{
		return $this->belongsTo(City::class, 'city_id');
	}
	
	public function messages()
	{
		return $this->hasMany(Message::class, 'post_id');
	}
	
	public function latestPayment()
	{
		return $this->hasOne(Payment::class, 'post_id')->orderBy('id', 'DESC');
	}
	
	public function payments()
	{
		return $this->hasMany(Payment::class, 'post_id');
	}
	
	public function pictures()
	{
		return $this->hasMany(Picture::class, 'post_id')->orderBy('position')->orderBy('id');
	}
	
	public function savedByUsers()
	{
		return $this->hasMany(SavedPost::class, 'post_id');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

    public function products()
    {
        return $this->hasMany(Product::class, 'post_id')
//            ->where('total_avail_quantity', '>', 0)
            ->where('translation_lang', config('app.locale'));
    }

    public function postVariant()
    {
        return $this->belongsTo(PostVariant::class, 'variant_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'post_id');
    }

    public function video()
    {
        return $this->hasMany(Video::class, 'post_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
	public function scopeVerified($builder)
	{
		$builder->where(function ($query) {
			$query->where('verified_email', 1)->where('verified_phone', 1);
		});
		
		if (config('settings.single.posts_review_activation')) {
			$builder->where('reviewed', 1);
		}
		
		return $builder;
	}
	
	public function scopeUnverified($builder)
	{
		$builder->where(function ($query) {
			$query->where('verified_email', 0)->orWhere('verified_phone', 0);
		});
		
		if (config('settings.single.posts_review_activation')) {
			$builder->orWhere('reviewed', 0);
		}
		
		return $builder;
	}
	
	public function scopeArchived($builder)
	{
		return $builder->where('archived', 1);
	}
	
	public function scopeUnarchived($builder)
	{
		return $builder->where('archived', 0);
	}
	
	public function scopeReviewed($builder)
	{
		if (config('settings.single.posts_review_activation')) {
			return $builder->where('reviewed', 1);
		} else {
			return $builder;
		}
	}
	
	public function scopeUnreviewed($builder)
	{
		if (config('settings.single.posts_review_activation')) {
			return $builder->where('reviewed', 0);
		} else {
			return $builder;
		}
	}
	
	public function scopeWithCountryFix($builder)
	{
		// Check the Domain Mapping Plugin
		if (config('plugins.domainmapping.installed')) {
			return $builder->where('country_code', config('country.code'));
		} else {
			return $builder;
		}
	}
	
	/*
	|--------------------------------------------------------------------------
	| ACCESSORS
	|--------------------------------------------------------------------------
	*/
	public function getCreatedAtAttribute($value)
	{
		$value = new Date($value);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		// echo $value->format('l d F Y H:i:s').'<hr>'; exit();
		// echo $value->formatLocalized('%A %d %B %Y %H:%M').'<hr>'; exit(); // Multi-language
		
		return $value;
	}
	
	public function getUpdatedAtAttribute($value)
	{
		$value = new Date($value);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		
		return $value;
	}
	
	public function getDeletedAtAttribute($value)
	{
		$value = new Date($value);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		
		return $value;
	}
	
	public function getCreatedAtTaAttribute($value)
	{
		$value = new Date($this->attributes['created_at']);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		$value = $value->ago();
		
		return $value;
	}
	
	public function getArchivedAtAttribute($value)
	{
		$value = (is_null($value)) ? $this->updated_at : $value;
		
		$value = new Date($value);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		
		return $value;
	}
	
	public function getDeletionMailSentAtAttribute($value)
	{
		$value = (is_null($value)) ? $this->updated_at : $value;
		
		$value = new Date($value);
		if (config('timezone.id')) {
			$value->timezone(config('timezone.id'));
		}
		
		return $value;
	}
	
	public function getEmailAttribute($value)
	{
		if (isFromAdminPanel() || (!isFromAdminPanel() && in_array(request()->method(), ['GET']))) {
			if (
				isDemo() &&
				request()->segment(2) != 'password'
			) {
				if (auth()->check()) {
					if (auth()->user()->id != 1) {
						$value = hidePartOfEmail($value);
					}
				}
			}
		}
		
		return $value;
	}
	
	public function getPhoneAttribute($value)
	{
		$countryCode = config('country.code');
		if (isset($this->country_code) && !empty($this->country_code)) {
			$countryCode = $this->country_code;
		}
		
		$value = phoneFormatInt($value, $countryCode);
		
		return $value;
	}
	
	public function getTitleAttribute($value)
	{
		$value = mb_ucfirst($value);
		
		if (!isFromAdminPanel()) {
			if (!empty($this->user)) {
				if (!$this->user->hasAllPermissions(Permission::getStaffPermissions())) {
					$value = RemoveFromString::contactInfo($value, false, true);
				}
			} else {
				$value = RemoveFromString::contactInfo($value, false, true);
			}

			if (!app()->runningInConsole()) {
                $value = RemoveFromString::lat2kir($value);
            }
		}
		
		return $value;
	}
	
	public function getContactNameAttribute($value)
	{
		$value = mb_ucwords($value);
		
		return $value;
	}
	
	public function getDescriptionAttribute($value)
	{
		if (!isFromAdminPanel()) {
			if (!empty($this->user)) {
				if (!$this->user->hasAllPermissions(Permission::getStaffPermissions())) {
					$value = RemoveFromString::contactInfo($value, false, true);
				}
			} else {
				$value = RemoveFromString::contactInfo($value, false, true);
			}
            if (!app()->runningInConsole()) {
                $value = RemoveFromString::lat2kir($value);
            }
		}
		
		return $value;
	}

    public function getMainPictureAttribute()
    {
        if (isset($this->pictures) && $this->pictures->count() > 0) {
            $picture = $this->pictures->first()->filename ? imgUrl($this->pictures->first()->filename, 'large') : $this->pictures->first()->product_picture_url;
        } else {
            $picture = imgUrl(config('larapen.core.picture.default'));
        }

        return $picture;
    }

    /*-------------------
    | Price
    *--------------------
     */

	public function getOldPriceAttribute()
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->getProducts()->sortBy('min_amount')->first();
            return $product->findTrans($product->tid, $this->priceLocale)->formated_price ? $product->findTrans($product->tid, $this->priceLocale)->formated_price : '';
        }
    }

	public function getPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->getProducts()->sortBy('min_amount')->first();
            if (!$product) {
                return 0;
            }
            return $product->findTrans($product->tid, $this->priceLocale)->min_activity_amount ? $product->findTrans($product->tid, $this->priceLocale)->min_activity_amount : $product->findTrans($product->tid, $this->priceLocale)->min_amount;
        }
    }


    public function getFormattedPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->products->sortBy('min_amount')->first();
            if (!$product) {
                return '';
            }
            $price = $product->findTrans($product->tid, $this->priceLocale)->min_activity_amount ? $product->findTrans($product->tid, $this->priceLocale)->min_activity_amount : $product->findTrans($product->tid, $this->priceLocale)->min_amount;
            return currency_format($price, currency()->getUserCurrency());
        }
    }

    public function getFormattedActivityPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->products->sortBy('min_amount')->first();
            if (!$product) {
                return '';
            }
            return $product->findTrans($product->tid, $this->priceLocale)->formated_activity_price ? $product->findTrans($product->tid, $this->priceLocale)->formated_activity_price : $product->findTrans($product->tid, $this->priceLocale)->formated_price;
        }
    }

    public function getMaxAmountAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->products->sortBy('min_amount')->first();
            if (!$product) {
                return '';
            }

            return $product->findTrans($product->tid, $this->priceLocale)->max_amount ? $product->findTrans($product->tid, $this->priceLocale)->max_amount : 0;
        }
    }

    /*
    | Discount
    */

    public function getDiscountAttribute()
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $product = $this->getProducts()->first();
            if (!$product) {
                return 0;
            }
            return $product->discount;
        }
    }

    public function getCalcDiscountAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $discount = $this->getProducts()->sortByDesc('discount')->first()->discount;
            if($discount) return $discount;

            $minPrice = $this->products->min('min_amount');
            $maxPrice = $this->products->max('min_amount');

            $calcDiscount = 0;

            if($maxPrice && $minPrice < $maxPrice) {
                $calcDiscount = ceil((((int) $maxPrice - (int) $minPrice) * 100) / $maxPrice);
            }

            return $calcDiscount;
        }
    }

    public function getAverageStarRageAttribute()
    {
        $product = $this->getProducts()->first();

        return ($product && !empty($product->rating) && $product->rating->count() > 0) ? $product->rating->average_star_rage : 0;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
	public function setTagsAttribute($value)
	{
        if (!isFromAdminPanel()) {
            if(config('app.locale') == 'de') {
                $this->attributes['tags'] = (!empty($value)) ? mb_strtolower($value) : $value;
            } else {
                $this->attributes['tags_en'] = (!empty($value)) ? mb_strtolower($value) : $value;
            }
        } else {
            $this->attributes['tags'] = (!empty($value)) ? mb_strtolower($value) : $value;
        }
    }

	public function setTitleAttribute($value)
    {
        if (!isFromAdminPanel()) {
            if(config('app.locale') == 'de') {
                $this->attributes['title'] = $value;
            } else {
                $this->attributes['title_en'] = $value;
            }

        } else {
            $this->attributes['title'] = $value;
        }
    }

	public function setDescriptionAttribute($value)
    {
        if (!isFromAdminPanel()) {
            if(config('app.locale') == 'de') {
                $this->attributes['description'] = $value;
            } else {
                $this->attributes['description' . '_en'] = $value;
            }

        }
    }
}
