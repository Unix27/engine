<?php


namespace App\Builders\Product\Providers\AliExpress;


class MainPicture extends BaseObject
{
    protected  $visible = [
        'main_picture',
        'main_picture_thumbnail',
    ];

    public function mapMainPicture()
    {
        return array_first($this->raw['imagePathList']);
    }

    public function mapMainPictureThumbnail()
    {
        return array_first($this->raw['summImagePathList']);
    }


    /**
     * @inheritDoc
     */
    public function relations()
    {
        // TODO: Implement relations() method.
    }
}