<?php


namespace App\Builders\Product;

use App\Builders\Product\Providers\Joom\Category;
use App\Builders\Product\Providers\Joom\Description;
use App\Builders\Product\Providers\Joom\FeedbackRating;
use App\Builders\Product\Providers\Joom\MainPicture;
use App\Builders\Product\Providers\Joom\Option;
use App\Builders\Product\Providers\Joom\Picture;
use App\Builders\Product\Providers\Joom\Price;
use App\Builders\Product\Providers\Joom\Product;
use App\Builders\Product\Providers\Joom\Review;
use App\Builders\Product\Providers\Joom\ReviewProduct;
use App\Builders\Product\Providers\Joom\Seller;
use App\Builders\Product\Providers\Joom\Sku;
use App\Builders\Product\Providers\Joom\Status;
use App\Builders\Product\Providers\Joom\Title;

class JoomBuilder implements Builder
{
    private $product;

    public function __construct(string $url, string $locale)
    {
        $this->product = new Product($url, $locale);
    }

    public function make()
    {
        $this->product->parse();
    }

    public function addSku()
    {
        $this->product->setSku(new Sku($this->product->getProductRawData('id')));
    }

    public function addCategory()
    {
        $this->product->setCategory(new Category($this->product->getProductRawData()));
    }

    public function addTitle()
    {
        $this->product->setTitle(new Title($this->product->getProductRawData('name')));
    }

    public function addDescription()
    {
        $this->product->setDescription(new Description($this->product->getProductRawData('description')));
    }

    public function addPrice()
    {
        $this->product->setPrice(new Price($this->product->getProductRawData()));
    }

    public function addPictures()
    {
        $this->product->setPictures(new Picture($this->product->getProductRawData("gallery")));
        $this->product->setMainPictures(new MainPicture($this->product->getProductRawData("mainImage")));
    }

    public function addOptions()
    {
        $this->product->setOptions(
            new Option(
                [
                    'productSKUPropertyList' => $this->product->getRawProductSKUPropertyList(),
                    'skuPriceList' => $this->product->getRawSkuPriceList()
                ]
            )
        );
    }

    public function addFeedbackRating()
    {
        $this->product->setFeedbackRating(new FeedbackRating($this->product->getRawData()));
    }

    public function addReviews()
    {
        $this->product->setReview(new ReviewProduct($this->product->getRawDataItems('productReviews')));
    }

    public function addMetaTags()
    {
        // TODO: Implement addMetaTags() method.
    }

    public function addSeller()
    {
        $this->product->setSeller(new Seller($this->product->getProductRawData('store')));
    }

    public function addStatus()
    {
        $this->product->setStatus(new Status($this->product->getProductRawData('inStock')));
    }

    public function getProduct()
    {
        return $this->product;
    }
}