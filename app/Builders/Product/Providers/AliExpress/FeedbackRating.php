<?php


namespace App\Builders\Product\Providers\AliExpress;


class FeedbackRating extends BaseObject
{
    protected $visible = [
        'feedbackRating'
    ];

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [
            'feedbackRating' => Rating::class
        ];
    }
}