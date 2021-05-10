<?php


namespace App\Builders\Product\Providers\AliExpress;


class Picture extends BaseObject
{
    protected $visible = [
        "imagePathList",
        "summImagePathList",
        "videoId",
        "videoUid",
        "videoUrl",
    ];


    /**
     * @return string
     * template: https://cloud.video.taobao.com/play/u/<<videoUid>>/p/1/e/6/t/10301/<<videoId>>.mp4
     */
    public function mapVideoUrl()
    {
        if($this->getRaw('videoUid') && $this->getRaw('videoId')) {
            return 'https://cloud.video.taobao.com/play/u/' . $this->getRaw('videoUid') . '/p/1/e/6/t/10301/'. $this->getRaw('videoId') .'.mp4';
        }
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
//        return [
//            "imagePathList[]" => ImagePathList::class,
//            "summImagePathList[]" => SummImagePathList::class,
//        ];
    }
}