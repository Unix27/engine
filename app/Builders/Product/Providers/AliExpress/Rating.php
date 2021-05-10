<?php


namespace App\Builders\Product\Providers\AliExpress;


class Rating extends BaseObject
{
    protected $visible = [
        "averageStar",
        "averageStarRage",
        "evarageStar",
        "evarageStarRage",
        "fiveStarNum",
        "fiveStarRate",
        "fourStarNum",
        "fourStarRate",
        "oneStarNum",
        "oneStarRate",
        "positiveRate",
        "threeStarNum",
        "threeStarRate",
        "totalValidNum",
        "trialReviewNum",
        "twoStarNum",
        "twoStarRate"
    ];

    /**
     * @inheritDoc
     */
    public function relations()
    {

    }
}