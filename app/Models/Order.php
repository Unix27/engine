<?php

namespace App\Models;

use Larapen\Admin\app\Models\Crud;

/**
 * Class Order
 * @package App\Models
 */
class Order extends BaseModel
{
    use Crud;
    /**
     * @var string
     */
    protected $table = 'orders';

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
        'number',
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
        'payment_status',
        'created_at',
        'post_code',
        'cart_id',
        'payment_id',
    ];

    const STATUS_INCOMPLETE = 'incomplete';
    const STATUS_PANDING = 'panding';
    const STATUS_SUCCESS = 'success';
    const STATUS_CANCEL = 'cancel';
    const STATUS_ERROR = 'error';

    public $expandable = ['title', 'option_details', 'quantity', 'price', 'total_price'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getUserNameHtml()
    {
        if (isset($this->user) and !empty($this->user)) {
            $url = admin_url('users/'.$this->user->getKey().'/edit');
            $tooltip = ' data-toggle="tooltip" title="'.$this->user->email.'"';

            return '<a href="'.$url.'"'.$tooltip.'>'.$this->user->email.'</a>';
        } else {
            return 'Unknown';
        }
    }
    public function getCurrencyCodeHtml()
    {
        if (isset($this->currency) and !empty($this->currency)) {
            return $this->currency->code;
        } else {
            return 'Unknown';
        }
    }

    public function getPackageHtml()
    {
        if (isset($this->package) and !empty($this->package)) {
            $url = admin_url('packages/order/'.$this->getKey().'/list');
            $tooltip = ' data-toggle="tooltip" title="'.$this->package->name.'"';

            return '<a href="'.$url.'"'.$tooltip.'>'.$this->package->name.'</a>';
        } else {
            return 'Unknown';
        }
    }

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
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id', 'payment_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'id', 'order_id')->where('translation_lang', config('app.locale'));
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getChildRowsAttribute()
    {
        return $this->items;
    }

}
