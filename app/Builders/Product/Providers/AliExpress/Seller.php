<?php


namespace App\Builders\Product\Providers\AliExpress;


use Carbon\Carbon;

class Seller extends BaseObject
{
    protected $visible = [
        'storeNum',
        'storeName',
        'countryCompleteName',
        'followingNumber',
        'openAt',
        'openedYear',
        'positiveNum',
        'positiveRate',
        'location',
        'topRatedSeller',
        'sellerAdminSeq',
        'storeUrl',
        'provider',
    ];

    public function mapOpenAt()
    {
        $res = $this->getRaw('openTime');
        return Carbon::parse($res)->toDateTime();
    }

    public function mapLocation()
    {
        return $this->getRaw('province');
    }

    public function mapProvider()
    {
        return \App\Models\Product::SERVICE_ALIEXPRESS;
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}