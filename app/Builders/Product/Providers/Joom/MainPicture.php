<?php


namespace App\Builders\Product\Providers\Joom;


class MainPicture extends BaseObject
{
    protected  $visible = [
        'main_picture',
        'main_picture_thumbnail',
    ];

    public function mapMainPicture()
    {
        return data_get(array_last($this->raw['images']), 'url');
    }

    public function mapMainPictureThumbnail()
    {
        return data_get(array_first($this->raw['images']), 'url');
    }


    /**
     * @inheritDoc
     */
    public function relations()
    {
        // TODO: Implement relations() method.
    }
}