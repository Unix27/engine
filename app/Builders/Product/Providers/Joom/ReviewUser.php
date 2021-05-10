<?php


namespace App\Builders\Product\Providers\Joom;


class ReviewUser extends BaseObject
{
    protected $visible = [
        'id',
        'fullName'
    ];

    public function mapFullName()
    {
        return $this->getRaw('fullName');
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        // TODO: Implement relations() method.
    }
}