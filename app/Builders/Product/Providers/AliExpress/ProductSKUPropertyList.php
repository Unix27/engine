<?php


namespace App\Builders\Product\Providers\AliExpress;


use Illuminate\Support\Str;

class ProductSKUPropertyList extends BaseObject
{
    protected $visible = [
        'isShowTypeColor',
        'order',
        'showType',
        'showTypeColor',
        'skuPropertyId',
        'skuPropertyName',
        'skuPropertyValues',
        'provider',
    ];

    public function mapSkuPropertyName()
    {
        return Str::title($this->getRaw('skuPropertyName'));
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
        return [
            'skuPropertyValues[]' => SkuPropertyValues::class,
        ];
    }
}