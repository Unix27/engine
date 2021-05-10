<?php

namespace App\Models;

use App\Helpers\RemoveFromString;
use App\Helpers\UrlGen;
use App\Models\Traits\TranslatedTrait;
use App\Models\Scopes\ActiveScope;
use App\Observer\AliExpressProductObserver;
use App\Observer\ProductObserver;
use Larapen\Admin\app\Models\Crud;

class Product extends BaseModel
{
    use Crud, TranslatedTrait;

    // Services
    public const SERVICE_UNDEFINED = 'undefined';
    public const SERVICE_EBAY = 'ebay';
    public const SERVICE_JOOM = 'joom';
    public const SERVICE_ALIEXPRESS = 'aliexpress';
    public const SERVICE_AMAZON= 'amazon';
    public const SERVICE_DHGATE= 'dhgate';


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $appends = ['tid'];

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
        'post_id',
        'translation_lang',
        'translation_of',
        'title',
        'description',
        'category_id',
        'sku',
        'seller_id',
        'formated_activity_price',
        'formated_price',
        'max_activity_amount',
        'max_amount',
        'min_activity_amount',
        'min_amount',
        'discount',
        'discount_promotion',
        'activity',
        'big_preview',
        'big_sell_product',
        'hidden_big_sale_price',
        'pre_sale',
        'total_avail_quantity',
        'in_stock',
        'active',
        'url',
        'descriptionUrl',
        'picture_url',
        'picture_url_thumbnail',
        'provider',
    ];

    public $translatable = [
        'title',
        'description',
    ];

    public $trackable = [
        'formated_activity_price',
        'formated_price',
        'max_activity_amount',
        'max_amount',
        'min_activity_amount',
        'min_amount',
    ];

    /**
     * Services list for parsing
     *
     * @var array
     */
    public static $providers = [
        self::SERVICE_EBAY,
        self::SERVICE_JOOM,
        self::SERVICE_ALIEXPRESS,
//        self::SERVICE_AMAZON,
        self::SERVICE_DHGATE,
    ];

    /*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/
    protected static function boot()
    {
        parent::boot();
        Product::observe( ProductObserver::class);
        static::addGlobalScope(new ActiveScope());
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getPictureHtml()
    {
        // Get ad URL
        $url = $this->url;

        $style = ' style="width:auto; max-height:90px;"';
        // Get first picture
        if ($this->picture_url_thumbnail) {
            $url = $this->picture_url_thumbnail;
            $out = '<img src="' . $this->picture_url_thumbnail . '" data-toggle="tooltip" title="' . $this->title . '"' . $style . '>';
        } else {
            // Default picture
            $out = '<img src="' . imgUrl(config('larapen.core.picture.default'), 'small') . '" data-toggle="tooltip" title="' . $this->title . '"' . $style . '>';
        }

        // Add link to the Ad
        $out = '<a href="' . $url . '" target="_blank">' . $out . '</a>';

        return $out;
    }
    public function getPostHtml()
    {
        if (isset($this->post) and !empty($this->post)) {
            $url = admin_url('posts/'. $this->post->id .'/edit');
            $tooltip = ' data-toggle="tooltip" title="'.$this->post->title.'"';

            return '<a href="'.$url.'"'.$tooltip.'>'.$this->post->title.'</a>';
        } else {
            return 'Unknown';
        }
    }

    public function getProviderHtml()
    {
        if (isset($this->provider) and !empty($this->provider)) {
            $url = $this->url;
            $tooltip = ' data-toggle="tooltip" title="'.$this->provider.'"';

            return '<a href="'.$url.'"'.$tooltip.' target="_blank">'.$this->provider.'</a>';
        } else {
            return 'Unknown';
        }
    }

    public function getTitleHtml()
    {
        $out = '';

        $out  .= getPostUrl($this->post);
        $out  .= '<br>';
        $out  .= '<small>';
        $out  .= $this->post->pictures->count() . ' ' . trans('admin::messages.pictures');
        $out  .= '</small>';

        return $out;
    }


    /*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function seller()
    {
        return $this->belongsTo(ProductSeller::class, 'seller_id');
    }

    public function optValPrices()
    {
        return $this->hasMany(ProductOptValPrice::class, 'product_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }

    public function availOptValPrices()
    {
        return $this->hasMany(ProductOptValPrice::class, 'product_id', 'translation_of')
            ->where('translation_lang', config('app.locale'));
    }

    public function rating() {
        return $this->hasOne(ProductFeedbackRating::class, 'product_id', 'translation_of');
    }
//    public function history()
//    {
//        return $this->morphMany(TrackingHistory::class, 'products', 'reference_table', 'reference_id');
//    }

    /*
|--------------------------------------------------------------------------
| SCOPES
|--------------------------------------------------------------------------
*/
    public function scopeAliExpress($builder)
    {
        return $builder->whereProvider(self::SERVICE_ALIEXPRESS);
    }

    public function scopeJoom($builder)
    {
        return $builder->whereProvider(self::SERVICE_JOOM);
    }

    /*
|--------------------------------------------------------------------------
| ACCESSORS
|--------------------------------------------------------------------------
*/

    /**
     * @param $value
     * @return String
     */
    public function getTitleAttribute($value)
    {
        if (!app()->runningInConsole() && !isFromAdminPanel()) {
            return RemoveFromString::lat2kir($value);
        } else {
            return $value;
        }
    }

    /**
     * @param $value
     * @return String
     */
    public function getDescriptionAttribute($value)
    {
        if (!app()->runningInConsole() && !isFromAdminPanel()) {
            return RemoveFromString::lat2kir($value);
        } else {
            return $value;
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->findTrans($this->tid, $this->priceLocale)->min_activity_amount ? $this->findTrans($this->tid, $this->priceLocale)->min_activity_amount : $this->findTrans($this->tid, $this->priceLocale)->min_amount;
        }
    }

    /**
     * @return string
     */
    public function getOldPriceAttribute()
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->findTrans($this->tid, $this->priceLocale)->formated_activity_price ? $this->findTrans($this->tid, $this->priceLocale)->formated_price : '';
        }
    }

    public function getFormattedPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $price = $this->findTrans($this->tid, $this->priceLocale)->min_activity_amount ? $this->findTrans($this->tid, $this->priceLocale)->min_activity_amount : $this->findTrans($this->tid, $this->priceLocale)->min_amount;
            return currency_format($price, currency()->getUserCurrency());
        }
    }

    public function getFormattedActivityPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->findTrans($this->tid, $this->priceLocale)->formated_activity_price ? $this->findTrans($this->tid, $this->priceLocale)->formated_activity_price : $this->findTrans($this->tid, $this->priceLocale)->formated_price;
        }
    }


    /*
    | Discount
    */

    public function getDiscountSumAttribute()
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            if(!$this->findTrans($this->tid, $this->priceLocale)->min_activity_amount) return 0;

            return currency_format(
                $this->findTrans($this->tid, $this->priceLocale)->max_amount - $this->findTrans($this->tid, $this->priceLocale)->min_activity_amount,
                currency()->getUserCurrency()
            );
        }
    }

}

