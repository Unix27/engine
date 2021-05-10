<?php


namespace App\Builders\Product\Providers\AliExpress;


use App\Builders\Product\Providers\ProductJson;
use Spatie\Url\Url;

class Product extends ProductJson
{
    private $title;
    private $description;
    private $sku;
    private $category;
    private $price;
    private $rating;
    private $pictures;
    private $mainPictures;
    private $options;
    private $metaTags;
    private $locale;
    private $url;
    private $rawData;
    private $seller;
    private $status;
    private $review;

    public $streamContextOptions = [
        'de' => [
            CURLOPT_POST => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36',
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_COOKIE => "aep_usuc_f='isfm=y&site=glo&c_tp=EUR&x_alimid=705816290&isb=y&region=UA&b_locale=de_DE'",
            CURLOPT_REFERER => 'https://de.aliexpress.com',
        ],
        'en' => [
            CURLOPT_POST => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36',
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_COOKIE => "aep_usuc_f='isfm=y&site=glo&c_tp=USD&x_alimid=705816290&isb=y&region=UA&b_locale=en_US'",
            CURLOPT_REFERER => 'https://aliexpress.com',
        ],
    ];

    public function __construct($url, $locale)
    {
        $this->setLocale($locale);
        $this->setUrl($url);
    }

    public function parse()
    {
        $options = $this->streamContextOptions[$this->getLocale()];
        $path = Url::fromString($this->getUrl())->getPath();
        $localisedUrl = $options[CURLOPT_REFERER] . $path;

        $page = $this->getWebPage($localisedUrl, $options);
        $this->setRawData($page['content']);
    }

    public function getRawData(string $key = null)
    {
        return $key ? data_get($this->rawData, $key, []) : $this->rawData;
    }

    public function setRawData(string $page)
    {
        $this->rawData = [];
        if (preg_match('#window.runParams = { data: (.*), csrfToken#', trim(preg_replace('/\s\s+/', ' ',   $page)), $matches)) {
            $this->rawData = json_decode($matches[1], true);
        }
    }

    public function setLocale(string $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setSku(Sku $sku)
    {
        $this->sku = $sku->get();
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category->get();
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setTitle(Title $title)
    {
        $this->title = $title->get();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription(Description $description)
    {
        $this->description = $description->get();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setFeedbackRating(FeedbackRating $rating)
    {
        $this->rating = $rating;
    }

    public function getFeedbackRating()
    {
        return $this->rating->first();
    }

    public function setMainPictures(MainPicture $pictures)
    {
        $this->mainPictures = $pictures;
    }

    public function getMainPictures()
    {
        return $this->mainPictures;
    }

    public function setPictures(Picture $picture)
    {
        $this->pictures = $picture;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function setOptions(Option $option)
    {
        $this->options = $option;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setMetaTag(MetaTag $metaTag)
    {
        $this->metaTags = $metaTag->get();
    }

    public function getMetaTags()
    {
        return $this->metaTags;
    }

    public function setSeller(Seller $seller)
    {
        $this->seller = $seller;
    }

    public function getSeller()
    {
        return $this->seller;
    }

    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getProvider()
    {
        return \App\Models\Product::SERVICE_ALIEXPRESS;
    }

    public function getReview()
    {
        return $this->review;
    }

    public function setReview(ReviewProduct $review)
    {
        $this->review = $review;
    }

}