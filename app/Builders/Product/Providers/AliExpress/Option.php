<?php


namespace App\Builders\Product\Providers\AliExpress;


class Option extends BaseObject
{
    protected $visible = [
        'productSKUPropertyList',
        'skuPriceList',
    ];

    /**
     * {@inheritdoc}
     */
    public function relations()
    {
        return [
            'productSKUPropertyList[]'    => ProductSKUPropertyList::class,
            'skuPriceList[]'  => SkuPriceList::class,
        ];
    }

}