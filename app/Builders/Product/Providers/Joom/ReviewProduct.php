<?php


namespace App\Builders\Product\Providers\Joom;


class ReviewProduct  extends BaseObject
{
    protected $visible = [
        'items'
    ];

    public function mapItems()
    {
        return is_array($this->raw) ? $this->raw : [];
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            'items[]' => Review::class
        ];
    }
}