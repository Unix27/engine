<?php


namespace App\Builders\Product\Providers\Joom;


use Illuminate\Support\Str;

class SkuPropertyValues extends BaseObject
{
    protected $visible = [
        "propertyValueDisplayName",
        "propertyValueId",
        "propertyValueIdLong",
        "propertyValueName",
        "skuPropertySendGoodsCountryCode",
        "skuPropertyTips",
        "skuPropertyValueShowOrder",
        "skuPropertyValueTips",
        "propertyValueDefinitionName",
        "skuColorValue",
        "skuPropertyImagePath",
        "skuPropertyImageSummPath",
        'provider',
    ];

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