<?php


namespace App\Builders\Product\Providers\Joom;


class FeedbackRating extends BaseObject
{
    protected $visible = [
        'feedbackRating'
    ];

    public function mapFeedbackRating()
    {
        $rawProductReviewFilters = array_first(data_get($this->raw['productReviewFilters'], 'data'));
        $rawProduct = array_first(data_get($this->raw['products'], 'data'));
        return [
            'rawProductReviewFilters' => $rawProductReviewFilters,
            'rawProduct'    => $rawProduct
        ];
    }
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