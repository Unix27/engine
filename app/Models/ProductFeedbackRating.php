<?php

namespace App\Models;

class ProductFeedbackRating extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_feedback_ratings';

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
        'product_id',
        'average_star',
        'average_star_rage',
        'evarage_star',
        'evarage_star_rage',
        'one_star_num',
        'one_star_rate',
        'two_star_num',
        'two_star_rate',
        'three_star_num',
        'three_star_rate',
        'four_star_num',
        'four_star_rate',
        'five_star_num',
        'five_star_rate',
        'positive_rate',
        'total_valid_num',
        'format_trade_count',
        ];

    /*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/
    protected static function boot()
    {
        parent::boot();
    }

    /*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }
}
