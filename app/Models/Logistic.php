<?php

namespace App\Models;

use Larapen\Admin\app\Models\Crud;

class Logistic extends BaseModel
{
    use Crud;
    /**
     * @var string
     */
    protected $table = 'logistics';

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
        'package_item_id',
        'status',
        'status_at',
        'title',
        'description',
        'comment',
        'active',
    ];

    const STATUS_INCOMPLETE = 'incomplete';
    const STATUS_PANDING = 'panding';
    const STATUS_SUCCESS = 'success';
    const STATUS_CANCEL = 'cancel';
    const STATUS_ERROR = 'error';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getStatusHtml()
    {
        $statuses = [
            self::STATUS_PANDING => 'Комплектуется',
            self::STATUS_SUCCESS => 'Отправлен',
            self::STATUS_CANCEL => 'Отменен',
            self::STATUS_ERROR => 'Возникла ошибка' ,
        ];

        return $statuses[$this->status];
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
    public function packageItem()
    {
        return $this->belongsTo(PackageItem::class, 'package_item_id');
    }


    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

}
