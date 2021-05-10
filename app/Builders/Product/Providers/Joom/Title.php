<?php


namespace App\Builders\Product\Providers\Joom;

class Title extends BaseObject
{
    protected $visible = [
        'value'
    ];

    public function mapValue()
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