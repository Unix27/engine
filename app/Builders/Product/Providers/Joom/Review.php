<?php


namespace App\Builders\Product\Providers\Joom;


use Carbon\Carbon;

class Review extends BaseObject
{
    protected $visible = [
        'id',
        'created_at',
        'productId',
        'productVariantId',
        'likesCount',
        'starRating',
        'user',
        'media',
        'text',
    ];

    public function mapMedia()
    {
        return isset($this->raw['media']) ? $this->raw['media'] : [];
    }

    public function mapText()
    {
        return $this->getRaw('text') ? $this->getRaw('text') : '';
    }

    public function mapCreatedAt()
    {
        return Carbon::createFromTimestampMs($this->getRaw('createdTimeMs'))->toDateTimeString();
    }

    public function mapUser()
    {
        return isset($this->raw['user']) ? $this->raw['user'] : [];
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            'user' => ReviewUser::class,
            'media[]' => ReviewMedia::class,
        ];
    }
}