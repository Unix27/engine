<?php

namespace App\Plugins\reviews\app\Models;

use App\Models\BaseModel;
use App\Models\Picture;
use App\Models\ReviewPicture;
use App\Models\ReviewVideo;
use App\Models\Scopes\LocalizedScope;
use App\Models\Scopes\ReviewedScope;
use App\Models\Scopes\VerifiedScope;
use App\Models\Traits\TranslatedTrait;
use App\Models\User;
use App\Observers\ReviewObserver;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Date\Date;
use Larapen\Admin\app\Models\Crud;

class Review extends BaseModel
{
    use Crud;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
//	public $incrementing = false;
	protected $appends = ['timeago'];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
//	public $timestamps = false;

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
		'user_id',
		'rating',
		'comment',
		'approved',
		'spam',
        'media',
        'user_name',
        'joom_review_id',
        'translation_lang',
        'created_at',
	];

    public $translatable = ['comment'];

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
	protected $dates = ['created_at', 'created_at'];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new LocalizedScope());
	}

	/**
	 * This function takes in Item ID, comment and the rating and attaches the review to the Item by its ID,
	 * then the average rating for the product is recalculated.
	 *
	 * @param $postId
	 * @param $comment
	 * @param $rating
	 */
	public function storeReviewForItem($postId, $comment, $rating)
	{
		$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->find($postId);
		if (auth()->check()) {
			$this->user_id = auth()->user()->id;
		}
		$this->comment = $comment;
		$this->rating = $rating;
		$post->reviews()->save($this);

		// Recalculate ratings for the specified product
		$post->recalculateRating();
	}

	/**
	 * @param $reviewId
	 * @return bool
	 */
	public static function deleteReviewForItem($reviewId)
	{
		$review = self::find($reviewId);
		if (empty($review)) {
			return null;
		}
		$postId = $review->post_id;

		// Delete the review
		$review->delete();

		// Recalculate ratings for the specified product
		$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->find($postId);
		if (empty($post)) {
			return null;
		}
		$post->recalculateRating();

		return $post;
	}

	/**
	 * @return string
	 */
	public function getPostTitleHtml()
	{
		$post = Post::find($this->post_id);

		return getPostUrl($post);
	}

	/**
	 * @return \Illuminate\Contracts\Translation\Translator|string
	 */
	public function getUserHtml()
	{
		if (!empty($this->user_id) && $this->user_id != 0) {
			$user = User::find($this->user_id);
			if (!empty($user)) {
				return $user->name;
			}
		}

		return trans('reviews::messages.Anonymous');
	}

	/**
	 * @return string
	 */
	public function getApprovedHtml()
	{
		if ($this->approved == 1) {
			return '<i class="admin-single-icon fa fa-toggle-on" aria-hidden="true"></i>';
		} else {
			return '<i class="admin-single-icon fa fa-toggle-off" aria-hidden="true"></i>';
		}
	}

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id')->where('translation_lang', config('app.locale'));
	}

    public function pictures()
    {
        return $this->hasMany(ReviewPicture::class, 'review_id')->orderBy('position')->orderBy('id', 'ASC');
    }

    public function video()
    {
        return $this->hasMany(ReviewVideo::class, 'review_id')->orderBy('position')->orderBy('id', 'ASC');
    }

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/
	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}

	public function scopeSpam($query)
	{
		return $query->where('spam', 1);
	}

	public function scopeNotSpam($query)
	{
		return $query->where('spam', 0);
	}

	public function scopeWithContent($query)
	{
		return $query->where('comment', '<>', '')->orWhereHas('pictures');
	}

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/
	public function getTimeagoAttribute()
	{
//		$date = Date::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        $date = Date::createFromTimeStamp(strtotime($this->created_at))->format('d.m');
		return $date;
	}
	public function getUserNameAttribute($value)
    {
        $cacheId = 'reviews.' . $this->id . '.user.' . config('lang.locale', 'en_US');
        return Cache::rememberForever($cacheId, function () use($value){
            $result = [];
            foreach (explode(' ', $value) as $part) {
                $length = \Illuminate\Support\Str::length($part);
                $pos = $length - 3;
                $mask = str_repeat('*', $length - $pos);
                $result[] = \Illuminate\Support\Str::finish(\Illuminate\Support\Str::substr($part, 0, $pos), $mask);
            }

            return implode(' ', $result);
        });
    }

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
