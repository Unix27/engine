<?php

namespace App\Models;

/**
 * Class CartItem
 * @package App\Models
 */
class CartItem extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'cart_items';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id',
        'post_id',
        'product_id',
        'options',
        'quantity',
        'price',
        'currency_code',
        'total_price',
        'created_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | QUERIES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return mixed
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    /**
     * @return mixed
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }
}
