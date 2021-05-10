<?php

namespace App\Models;

/**
 * Class Cart
 * @package App\Models
 */
class Cart extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'cart';

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
        'is_guest',
        'user_id',
        'customer_email',
        'customer_first_name',
        'customer_last_name',
        'address',
        'country_id',
        'city',
        'mobile_phone',
        'shipping_method',
        'payment_method',
        'items_count',
        'total_price',
        'currency_code',
        'created_at',
        'updated_at',
        'post_code',
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    /**
     * @return mixed
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id')->with(['post', 'currency']);
    }
}
