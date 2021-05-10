<?php


namespace App\Builders\Product\Providers\AliExpress;


class Price  extends BaseObject
{
    protected $visible = [
        'formatedActivityPrice',
        'formatedPrice',
        'maxActivityAmount',
        'maxAmount',
        'minActivityAmount',
        'minAmount',
        'discount',
        'discountPromotion',
        'activity',
        'bigPreview',
        'bigSellProduct',
        'hiddenBigSalePrice',
        'preSale',
    ];


    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            'maxActivityAmount' => PriceAmountAttribute::class,
            'maxAmount' => PriceAmountAttribute::class,
            'minActivityAmount' => PriceAmountAttribute::class,
            'minAmount' => PriceAmountAttribute::class,
        ];
    }
}