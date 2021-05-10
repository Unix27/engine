<?php


namespace App\Builders\Product\Providers\Joom;


class Status extends BaseObject
{
    protected $visible = [
        'itemStatus',
        'totalAvailQuantity',
    ];

    public function mapItemStatus()
    {
        return $this->raw;
    }

    public function mapTotalAvailQuantity()
    {
        return $this->raw;
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}