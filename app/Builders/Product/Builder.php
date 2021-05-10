<?php


namespace App\Builders\Product;


interface Builder
{

    public function make();
    public function addSku();
    public function addCategory();
    public function addTitle();
    public function addDescription();
    public function addPrice();
    public function addPictures();
    public function addOptions();
    public function addReviews();
    public function addMetaTags();
    public function addSeller();
    public function addStatus();
    public function addFeedbackRating();


//    public function addWebPage($url, $options = [], $proxy = false, $timeout = 30);
//    public function addRawData(string $html);

    public function getProduct();
}