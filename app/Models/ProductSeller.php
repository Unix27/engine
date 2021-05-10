<?php

namespace App\Models;

class ProductSeller extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_sellers';

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
        'store_num',
        'name',
        'positive_num',
        'positive_rate',
        'location',
        'seller_admin_seq',
        'store_url',
        'top_rated_seller',
        'open_at',
        'provider'
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
        return $this->hasMany(Product::class, 'seller_id');
    }

}
