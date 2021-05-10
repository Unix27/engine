<?php


namespace App\Builders\Product\Providers\Joom;


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

    public function mapSkuPropertyId()
    {
       return Str::snake($this->raw['skuPropertyId']);
    }
    public function mapSkuPropertyName()
    {
        return Str::title($this->raw['skuPropertyName']);
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
        return [
            'skuPropertyValues[]' => SkuPropertyValues::class,
        ];
    }
}