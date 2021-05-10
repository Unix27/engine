<?php


namespace App\Builders\Product\Providers\Joom;


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

    public function mapStoreNum()
    {
        return $this->raw['id'];
    }

    public function mapStoreName()
    {
        return $this->raw['name'];
    }
    public function mapOpenAt()
    {
        $res = $this->raw('createdTimeMs');
        return Carbon::parse($res)->toDateTime();
    }

    public function mapLocation()
    {
        return $this->getRaw('location');
    }

    public function mapProvider()
    {
        return \App\Models\Product::SERVICE_JOOM;
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}