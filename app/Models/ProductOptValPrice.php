<?php

namespace App\Models;

use App\Models\Traits\TranslatedTrait;
use App\Models\Scopes\ActiveScope;
use App\Observer\ProductOptValPriceObserver;
use Larapen\Admin\app\Models\Crud;

class ProductOptValPrice extends BaseModel
{
    use Crud, TranslatedTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_opt_val_prices';

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
        'product_id',
        'translation_lang',
        'translation_of',
        'sku_attr',
        'sku_prop_ids',
        'act_sku_cal_price',
        'act_sku_multi_currency_cal_price',
        'act_sku_multi_currency_display_price',
        'sku_activity_amount',
        'formated_sku_activity_amount',
        'sku_amount',
        'formated_sku_amount',
        'sku_cal_price',
        'sku_multi_currency_cal_price',
        'discount',
        'is_activity',
        'avail_quantity',
        'inventory',
        'active',
    ];

    public $translatable = [
        'sku_attr',
        'sku_prop_ids',
        'is_activity',
    ];

    /*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/
    protected static function boot()
    {
        parent::boot();
        ProductOptValPrice::observe( ProductOptValPriceObserver::class);
        static::addGlobalScope(new ActiveScope());
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

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

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }

    /*
|--------------------------------------------------------------------------
| ACCESSORS
|--------------------------------------------------------------------------
*/

    public function getPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->translation($this->priceLocale)->sku_activity_amount ? $this->translation($this->priceLocale)->sku_activity_amount : $this->translation($this->priceLocale)->sku_amount;
        }
    }


    public function getOldPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->translation($this->priceLocale)->formated_sku_amount && $this->translation($this->priceLocale)->sku_amount > $this->translation($this->priceLocale)->sku_activity_amount ? $this->translation($this->priceLocale)->formated_sku_amount : '';
        }
    }

    public function getFormattedPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            $price = $this->translation($this->priceLocale)->sku_activity_amount ? $this->translation($this->priceLocale)->sku_activity_amount : $this->translation($this->priceLocale)->sku_amount;
            return currency_format($price, currency()->getUserCurrency());
        }
    }

    public function getFormattedActivityPriceAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->translation($this->priceLocale)->formated_sku_activity_amount ? $this->translation($this->priceLocale)->formated_sku_activity_amount : $this->translation($this->priceLocale)->formated_sku_amount;
        }
    }

    public function getDiscountSumAttribute()
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return $this->product->discount_sum;
        }
    }

    public function getDiscountAttribute($value)
    {
        if(!isFromAdminPanel() && !app()->runningInConsole()) {
            return  $value ? $value : $this->product->discount;
        }
    }

    public function getSkuPropIdsArrayAttribute()
    {
        return array_sort(explode(',', $this->sku_prop_ids));
    }

}
