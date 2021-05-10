<?php


namespace App\Builders\Product\Providers\Joom;


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