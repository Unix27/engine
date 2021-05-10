<?php


namespace App\Builders\Product\Providers\Joom;


class SkuPriceListSkuVal extends BaseObject
{
    protected $visible = [
        "actSkuCalPrice",
        "actSkuMultiCurrencyCalPrice",
        "actSkuMultiCurrencyDisplayPrice",
        "availQuantity",
        "inventory",
        "isActivity",
        "optionalWarrantyPrice",
        "skuActivityAmount",
        "skuAmount",
        "skuCalPrice",
        "skuMultiCurrencyCalPrice",
        "skuMultiCurrencyDisplayPrice",
        "discount"
    ];

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            "skuActivityAmount" => PriceAmountAttribute::class,
            "skuAmount" => PriceAmountAttribute::class,
        ];
    }
}