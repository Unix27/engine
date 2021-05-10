<?php


namespace App\Builders\Product\Providers\AliExpress;


class Status extends BaseObject
{
    protected $visible = [
        'itemStatus',
        'totalAvailQuantity'
    ];

    public function mapItemStatus()
    {
        return $this->getRaw('totalAvailQuantity') > 0;
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}