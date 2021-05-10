<?php

namespace App\Models;

class ProductField extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_fields';

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
        'field_id',
        'sku_property_id',
        'name',
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
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
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

