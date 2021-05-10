<?php


namespace App\Builders\Product\Providers\AliExpress;


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
        "skuMultiCurrencyDisplayPrice"
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