<?php


namespace App\Builders\Product\Providers\Joom;


class MinMaxAttribute extends BaseObject
{
    protected $visible = [
        'min',
        'max'
    ];
    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}