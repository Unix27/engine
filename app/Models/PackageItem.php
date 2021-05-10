<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use App\Models\Traits\TranslatedTrait;
use App\Observer\PackageItemObserver;
use Larapen\Admin\app\Models\Crud;

class PackageItem extends BaseModel
{
    use Crud, TranslatedTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'package_items';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    // protected $primaryKey = 'id';
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
        'package_id',
        'post_id',
        'product_id',
        'product_price',
        'product_price_currency_code',
        'delivery_price',
        'delivery_price_currency_code',
        'status',
        'status_at',
        'title',
        'description',
        'comment',
        'active',
        'tracking_code',
        'order_item_id',
        'translation_lang',
        'translation_of',
    ];
    public $translatable = ['title', 'description', 'comment'];

    const STATUS_NEW = 'new';
    const STATUS_PANDING = 'panding';
    const STATUS_SUCCESS = 'success';
    const STATUS_CANCEL = 'cancel';
    const STATUS_ERROR = 'error';
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

		PackageItem::observe(PackageItemObserver::class);
		
        static::addGlobalScope(new ActiveScope());
    }

    public function getProductHtml()
    {
        $out = '';
        if (!empty($this->post)) {
            $currentUrl = preg_replace('#/(search)$#', '', url()->current());
            $editUrl = $currentUrl . '/' . $this->post->id . '/edit';

            $out .= '<a href="' . $editUrl . '">' . $this->post->title . '</a>';
        } else {
            $out .= '--';
        }

        return $out;
    }

    public function getStatusHtml()
    {
        $statuses = [
            self::STATUS_NEW => 'Передеано на укомплектовку',
            self::STATUS_PANDING => 'Комплектуется',
            self::STATUS_SUCCESS => 'Отправлен',
            self::STATUS_CANCEL => 'Отменен',
            self::STATUS_ERROR => 'Возникла ошибка' ,
        ];

        return $statuses[$this->status];
    }

    public function logisticBtn($xPanel = false)
    {
        $out = '';
        $url = admin_url('logistic_timeline/' . $this->id . '/list');
        $out .= '<a class="btn btn-xs btn-info" href="' . $url . '">';
        $out .= '<i class="fa fa-cog"></i> ';
        $out .= 'Logistic';
        $out .= '</a>';

        return $out;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function post_price_currency()
    {
        return $this->belongsTo(Currency::class, 'post_price_currency_code', 'code');
    }

    public function delivery_price_currency()
    {
        return $this->belongsTo(Currency::class, 'delivery_price_currency_code', 'code');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }

    public function logistics()
    {
        return $this->hasMany(Logistic::class, 'package_item_id', 'translation_of');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    
    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
