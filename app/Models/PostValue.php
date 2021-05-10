<?php

namespace App\Models;


use App\Observer\PostValueObserver;
use Larapen\Admin\app\Models\Crud;

class PostValue extends BaseModel
{
	use Crud;
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_values';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    //protected $primaryKey = 'id';
    
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
        'field_id',
        'option_id',
        'value',
        'product_picture_url',
        'product_picture_url_thumbnail',
        'provider',
        'picture_id',
        'product_field_option_id',
    ];
    
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
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
	
		PostValue::observe(PostValueObserver::class);
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
    
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id', 'translation_of')->where('translation_lang', config('app.locale'));
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeAliexpress($builder)
    {
        return $builder->where('provider', Product::SERVICE_ALIEXPRESS);
    }

    public function scopeJoom($builder)
    {
        return $builder->where('provider', Product::SERVICE_JOOM);
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
