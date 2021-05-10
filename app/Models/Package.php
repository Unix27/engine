<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use App\Models\Traits\TranslatedTrait;
use App\Observer\PackageObserver;
use Larapen\Admin\app\Models\Crud;

class Package extends BaseModel
{
    use Crud, TranslatedTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packages';
    
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
        'name',
        'short_name',
        'ribbon',
        'has_badge',
        'price',
        'currency_code',
        'duration',
        'description',
        'active',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'translation_lang',
        'translation_of',
        'comment',
        'status',
        'user_id',
        'order_id',
    ];

    public $translatable = ['name', 'short_name', 'description', 'comment'];
    
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
    // protected $dates = [];

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
	
		Package::observe(PackageObserver::class);
		
        static::addGlobalScope(new ActiveScope());
    }

    public function itemsBtn($xPanel = false)
    {
        $out = '';

        if (isset($this->items) && $this->items->count() > 0) {
            $url = admin_url('package_items/' . $this->id . '/list');

            $out .= '<a class="btn btn-xs btn-info" href="' . $url . '">';
            $out .= '<i class="fa fa-cog"></i> ';
            $out .= 'Items (' . $this->items->count() . ')';
            $out .= '</a>';
        }

        return $out;
    }

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

    public function paymentsBtn($xPanel = false)
    {
        $out = '';
        if(isset($this->payments) && $this->payments->count() > 0) {
            $url = admin_url('/payments/package/' . $this->id . '/list');
            if($this->payments->count() == $this->payments->where('payment_status', Payment::STATUS_SUCCESS)->count()) {
                $out .= '<a class="btn btn-xs btn-success" href="' . $url . '">';
            } else {
                $out .= '<a class="btn btn-xs btn-info" href="' . $url . '">';
            }

            $out .= '<i class="fa fa-cc-paypal"></i> ';
            $out .= 'Payments (' . $this->payments->count() . '/' . $this->payments->where('payment_status', Payment::STATUS_SUCCESS)->count() .')';
            $out .= '</a>';
        }
        return $out;
    }

    public function getOrderHtml()
    {
        if (isset($this->order) and !empty($this->order)) {
            $url = admin_url('orders/'.$this->order->getKey().'/edit');
            $tooltip = ' data-toggle="tooltip" title="'.$this->order->number.'"';

            return '<a href="'.$url.'"'.$tooltip.'>'.$this->order->number.'</a>';
        } else {
            return 'Unknown';
        }
    }

    public function getOrderAtHtml()
    {
        if (isset($this->order) and !empty($this->order)) {
            return $this->order->created_at;
        } else {
            return 'Unknown';
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'package_id');
    }

    public function items()
    {
        return $this->hasMany(PackageItem::class, 'package_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
	public function scopeApplyCurrency($builder)
	{
		if (config('settings.geo_location.local_currency_packages_activation')) {
			$builder->where('currency_code', config('country.currency'));
		}
		
		return $builder;
	}
    
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
