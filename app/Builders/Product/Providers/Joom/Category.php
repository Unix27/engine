<?php


namespace App\Builders\Product\Providers\Joom;


class Category extends BaseObject
{
    protected $visible = [
        'id',
    ];

    public function mapId()
    {
        return $this->raw['category']['id'];
    }


    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}