<?php


namespace App\Builders\Product\Providers\Joom;


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

    public function mapAverageStar()
    {
        return data_get($this->raw['rawProduct'], 'rating');
    }

    public function mapAverageStarRage()
    {
        return data_get($this->raw['rawProduct'], 'rating')*100/5;
    }

    public function mapEvarageStar()
    {
        return data_get($this->raw['rawProduct'], 'rating');
    }

    public function mapEvarageStarRage()
    {
        return data_get($this->raw['rawProduct'], 'rating')*100/5;
    }

    public function mapOneStarNum()
    {
        $data = array_filter($this->raw['rawProductReviewFilters'], function ($value) {
            return $value['id'] == 'oneStar';
        });
        $rating = data_get(array_first($data), 'count');
        return $rating['value'];
    }

    public function mapTwoStarNum()
    {
        $data = array_filter($this->raw['rawProductReviewFilters'], function ($value) {
            return $value['id'] == 'twoStars';
        });
        $rating = data_get(array_first($data), 'count');
        return $rating['value'];
    }

    public function mapThreeStarNum()
    {
        $data = array_filter($this->raw['rawProductReviewFilters'], function ($value) {
            return $value['id'] == 'threeStars';
        });
        $rating = data_get(array_first($data), 'count');
        return $rating['value'];
    }

    public function mapFourStarNum()
    {
        $data = array_filter($this->raw['rawProductReviewFilters'], function ($value) {
            return $value['id'] == 'fourStars';
        });
        $rating = data_get(array_first($data), 'count');
        return $rating['value'];
    }

    public function mapFiveStarNum()
    {
        $data = array_filter($this->raw['rawProductReviewFilters'], function ($value) {
            return $value['id'] == 'fiveStars';
        });
        $rating = data_get(array_first($data), 'count');
        return $rating['value'];
    }

    public function mapTotalValidNum()
    {
        $rawReviewsCount = data_get($this->raw['rawProduct'], 'reviewsCount');
        return data_get($rawReviewsCount, 'value', 0);
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        // TODO: Implement relations() method.
    }
}