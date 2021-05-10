<?php


namespace App\Builders\Product\Providers\Joom;

/**
 * Class Picture
 *
 * @method array getImagePathList()
 * @method array getSummImagePathList()
 * @method string getVideoUid()
 * @method string getVideoUrl()
 *
 */

class Picture extends BaseObject
{

    protected $visible = [
        'imagePathList',
        'summImagePathList',
        "videoUid",
        "videoUrl",
    ];

    /**
     * @return array
     */
    public function mapImagePathList()
    {
        $result = [];

        foreach ($this->raw as $item) {
            $result[] = data_get(array_last($item['payload']['images']), 'url');
        }

        return $result;
    }

    /**
     * @return array
     */
    public function mapSummImagePathList()
    {
        $result = [];
        foreach ($this->raw as $item) {
            $result[] = data_get(array_first($item['payload']['images']), 'url');
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [];
    }
}