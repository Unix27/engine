<?php


namespace App\Builders\Product\Providers\Joom;


class SkuPriceList extends BaseObject
{

    protected $visible = [
        "skuAttr",
        "skuId",
        "skuPropIds",
        "skuVal",
    ];

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            "skuVal" => SkuPriceListSkuVal::class,
        ];
    }

}