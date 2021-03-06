<?php

namespace App\Models;

use App\Helpers\UrlGen;
use App\Models\Scopes\LocalizedScope;
use App\Models\Scopes\StrictActiveScope;
use App\Observer\PaymentObserver;
use Larapen\Admin\app\Models\Crud;

class Payment extends BaseModel
{
	use Crud;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	// protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	// public $timestamps = false;
	
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
	protected $fillable = ['post_id', 'package_id', 'payment_method_id', 'transaction_id', 'active', 'payment_id', 'payment_status', 'user_id', 'payer_id', 'affise_clickid', 'affise_secure'];
	
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
    const STATUS_INCOMPLETE = 'incomplete';
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
		
		Payment::observe(PaymentObserver::class);
		
		static::addGlobalScope(new StrictActiveScope());
		static::addGlobalScope(new LocalizedScope());
	}
	
	public function getPostTitleHtml()
	{
		$out = '#' . $this->post_id;
		if ($this->post) {
			$postUrl = url(UrlGen::postUri($this->post));
			$out .= ' | ';
			$out .= '<a href="' . $postUrl . '" target="_blank">' . $this->post->title . '</a>';
			
			if (config('settings.single.posts_review_activation')) {
				$outLeft = '<div class="pull-left">' . $out . '</div>';
				$outRight = '<div class="pull-right"></div>';
				
				if ($this->active != 1) {
					// Check if this ad has at least successful payment
					$countSuccessfulPayments = Payment::where('post_id', $this->post_id)->where('active', 1)->count();
					if ($countSuccessfulPayments <= 0) {
						$msg = trans('admin::messages.payment_post_delete_btn_tooltip');
						$tooltip = ' data-toggle="tooltip" title="' . $msg . '"';
						
						$outRight = '';
						$outRight .= '<div class="pull-right">';
						$outRight .= '<a href="' . admin_url('posts/' . $this->post_id) . '" class="btn btn-xs btn-danger" data-button-type="delete"' . $tooltip . '>';
						$outRight .= '<i class="fa fa-trash"></i> ';
						$outRight .= trans('admin::messages.Delete');
						$outRight .= '</a>';
						$outRight .= '</div>';
					}
				}
				
				$out = $outLeft . $outRight;
			}
		}
		
		return $out;
	}
	
	public function getPackageNameHtml()
	{
		$out = $this->package_id;
		
		if (!empty($this->package)) {
			$packageUrl = admin_url('packages/' . $this->package_id . '/edit');
			
			$out = '';
			$out .= '<a href="' . $packageUrl . '">';
			$out .= $this->package->name;
			$out .= '</a>';
			$out .= ' (' . $this->package->price . ' ' . $this->package->currency_code . ')';
		}
		
		return $out;
	}
	
	public function getPaymentMethodNameHtml()
	{
		$out = '--';
		
		if (!empty($this->paymentMethod)) {
			$paymentMethodUrl = admin_url('payment_methods/' . $this->payment_method_id . '/edit');
			
			$out = '';
			$out .= '<a href="' . $paymentMethodUrl . '">';
			if ($this->paymentMethod->name == 'offlinepayment') {
				$out .= trans('offlinepayment::messages.Offline Payment');
			} else {
				$out .= $this->paymentMethod->display_name;
			}
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

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}
	
	public function package()
	{
		return $this->belongsTo(Package::class, 'package_id', 'translation_of')->where('translation_lang', config('app.locale'));
	}
	
	public function paymentMethod()
	{
		return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
	}

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

	public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'payment_id');
    }

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/
    public function scopeSuccess($builder)
    {
        return $builder->where('payment_status', self::STATUS_SUCCESS);
    }

    public function scopeIncomplete($builder)
    {
        return $builder->where('payment_status', self::STATUS_INCOMPLETE);
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
