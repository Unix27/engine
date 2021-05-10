<?php


namespace App\Builders\Product\Providers\AliExpress;


class PriceAmountAttribute extends BaseObject
{
    protected $visible = [
        "currency",
        "formatedAmount",
        "value",
    ];

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}