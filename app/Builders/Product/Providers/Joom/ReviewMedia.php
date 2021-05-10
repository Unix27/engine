<?php


namespace App\Builders\Product\Providers\Joom;


class ReviewMedia extends BaseObject
{
    protected $visible = [
        'type',
        'payload',
    ];

    public function mapPayload()
    {
        if($this->type == 'image') {
            $payload = data_get($this->raw['payload'], 'images');
            $image = array_last($payload);
            $thumbnail = array_first($payload);
            return collect(['image' => data_get($image, 'url'), 'thumbnail' => data_get($thumbnail, 'url')]);
        }

        if($this->type == 'video') {
            $streamUrl = data_get($this->raw['payload'], 'streamUrl');
            $thumbnailData = data_get($this->raw['payload'], 'thumbnail');
            $thumbnail = array_last(data_get($thumbnailData, 'images', []));
            return collect(['streamUrl' => $streamUrl, 'thumbnail' => data_get($thumbnail, 'url')]);
        }
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        // TODO: Implement relations() method.
    }
}