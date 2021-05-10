<?php

namespace App\Models;

use App\Models\Traits\TranslatedTrait;
use App\Models\Scopes\ActiveScope;
use App\Observer\JoomProductObserver;
use Larapen\Admin\app\Models\Crud;

class JoomProduct extends BaseModel
{
    use Crud, TranslatedTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'joom_products';

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
        'translation_lang',
        'translation_of',
        'title',
        'description',
        'sku',
        'price',
        'minAmount',
        'minActivityAmount',
        'maxAmount',
        'maxActivityAmount',
        'formattedPrice',
        'formattedActivityPrice',
        'discount',
        'averageStar',
        'averageStarRage',
        'totalReviewCount',
        'url',
        'category_id',
        'raw_data',
        'translation_lang',
        'translation_of',
        'inStock',
        'favorite',
        'active',
        'seller_id',
        ];

    public $translatable = [
        'title',
        'description',
        'price',
        'minAmount',
        'minActivityAmount',
        'maxAmount',
        'maxActivityAmount',
        'formattedPrice',
        'formattedActivityPrice',
    ];

    public $trackable = ['price', 'minAmount'];

    /*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/
    protected static function boot()
    {
        parent::boot();

        JoomProduct::observe( JoomProductObserver::class);

        static::addGlobalScope(new ActiveScope());
    }

    /*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'translation_of')->where(
            'translation_lang',
            config('app.locale')
        );

    }

}