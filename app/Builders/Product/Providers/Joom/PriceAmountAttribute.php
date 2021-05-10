<?php


namespace App\Builders\Product\Providers\Joom;


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