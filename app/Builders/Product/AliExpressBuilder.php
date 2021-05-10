<?php


namespace App\Builders\Product;

use App\Builders\Product\Providers\AliExpress\Category;
use App\Builders\Product\Providers\AliExpress\Description;
use App\Builders\Product\Providers\AliExpress\FeedbackRating;
use App\Builders\Product\Providers\AliExpress\MainPicture;
use App\Builders\Product\Providers\AliExpress\MetaTag;
use App\Builders\Product\Providers\AliExpress\Option;
use App\Builders\Product\Providers\AliExpress\Picture;
use App\Builders\Product\Providers\AliExpress\Price;
use App\Builders\Product\Providers\AliExpress\Product;
use App\Builders\Product\Providers\AliExpress\Seller;
use App\Builders\Product\Providers\AliExpress\Sku;
use App\Builders\Product\Providers\AliExpress\Status;
use App\Builders\Product\Providers\AliExpress\Title;


class AliExpressBuilder implements Builder
{
    private $product;

    public function __construct(string $url, string $locale)
    {
        $this->product = new Product($url, $locale);
    }

    /**
     * Page parsing
     * @param $url
     * @param $locale
     */
    public function make()
    {
        $this->product->parse();
    }

    /**
     * find sku
     */
    public function addSku()
    {
        $this->product->setSku(new Sku($this->product->getRawData('commonModule')));
    }

    /**
     * find categor
     */
    public function addCategory()
    {
        $this->product->setCategory(new Category($this->product->getRawData('crossLinkModule')));
    }

    /**
     *
     */
    public function addTitle()
    {
        $this->product->setTitle(new Title($this->product->getRawData('pageModule')));
    }

    /**
     *
     */
    public function addDescription()
    {
        $this->product->setDescription(new Description($this->product->getRawData('pageModule')));
    }

    /**
     *
     */
    public function addPrice()
    {
        $this->product->setPrice(new Price($this->product->getRawData('priceModule')));
    }

    /**
     *
     */
    public function addPictures()
    {
        $this->product->setPictures(new Picture($this->product->getRawData('imageModule')));
        $this->product->setMainPictures(new MainPicture($this->product->getRawData("imageModule")));
    }

    /**
     *
     */
    public function addOptions()
    {
        if(data_get($this->product->getRawData('skuModule'), 'productSKUPropertyList')) {
            $this->product->setOptions(new Option($this->product->getRawData('skuModule')));
        }
    }

    /**
     *
     */
    public function addMetaTags()
    {
        $this->product->setMetaTag(new MetaTag($this->product->getRawData('pageModule')));
    }


    public function addSeller()
    {
        $this->product->setSeller(new Seller($this->product->getRawData('storeModule')));
    }

    public function addStatus()
    {
        $this->product->setStatus(new Status($this->product->getRawData('quantityModule')));
    }

    public function addFeedbackRating()
    {
        $this->product->setFeedbackRating(new FeedbackRating($this->product->getRawData('titleModule')));
    }

    /**
     *
     */
    public function addReviews()
    {
        // TODO: Implement addReviews() method.
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

}