<?php


namespace App\Builders\Product;

use App\Builders\Product\Providers\ProductJson;

class ProductDirector
{
    public function build(Builder $builder):  ProductJson
    {
        $builder->make();
        $builder->addSku();
        $builder->addTitle();
        $builder->addDescription();
        $builder->addCategory();
        $builder->addPrice();
        $builder->addOptions();
        $builder->addPictures();
        $builder->addMetaTags();
        $builder->addReviews();
        $builder->addSeller();
        $builder->addStatus();
        $builder->addFeedbackRating();
        return $builder->getProduct();
    }
}