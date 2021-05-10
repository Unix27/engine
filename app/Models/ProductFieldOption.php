<?php

namespace App\Models;


class ProductFieldOption extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_field_options';

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
        'option_id',
        'sku_property_id',
        'property_value_id',
        'value',
        'provider',
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
    public function option()
    {
        return $this->belongsTo(FieldOption::class, 'option_id');
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

}
