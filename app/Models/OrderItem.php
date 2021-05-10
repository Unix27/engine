<?php

namespace App\Models;

use Larapen\Admin\app\Models\Crud;

/**
 * Class OrderItem
 * @package App\Models
 */
class OrderItem extends BaseModel
{
    use Crud;
    /**
     * @var string
     */
    protected $table = 'order_items';


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
        'order_id',
        'post_id',
        'product_id',
        'options',
        'quantity',
        'price',
        'currency_code',
        'total_price',
        'created_at',
        'updated_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getProductTitleHtml()
    {
        if($this->product->url) {
            return '<a target="_blank" href="'.$this->product->url.'"'.'>'.$this->product->title.'</a>';
        } else {
            return $this->product->title;
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
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return mixed
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    /**
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function packageItem()
    {
        return $this->belongsTo(PackageItem::class,'id','order_item_id')->where('translation_lang', config('app.locale'));
    }

    /*
   |--------------------------------------------------------------------------
   | ACCESSORS
   |--------------------------------------------------------------------------
   */

    public function getTitleAttribute()
    {
        return $this->getProductTitleHtml();
    }

    public function getDescriptionAttribute()
    {
        return $this->product->description;
    }

    public function getOptionDetailsAttribute()
    {
        $options = json_decode($this->options, 1);
        $optionDetails = [];
        foreach ($options as $fieldId => $optionId) {
            $field = Field::findTrans($fieldId, 'en');
            $value = FieldOption::findTrans($optionId, 'en');
            $optionDetails[] = $field->name . ': ' . $value->value;
        }

        return implode(', ', $optionDetails);
    }
}