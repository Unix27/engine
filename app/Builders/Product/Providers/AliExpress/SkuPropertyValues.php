<?php


namespace App\Builders\Product\Providers\AliExpress;


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

    public function mapPropertyValueDisplayName()
    {
        return Str::title($this->getRaw('propertyValueDisplayName'));
    }

    public function mapPropertyValueName()
    {
        return Str::title($this->getRaw('propertyValueName'));
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
        return [];
    }
}