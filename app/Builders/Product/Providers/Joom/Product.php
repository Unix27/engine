<?php


namespace App\Builders\Product\Providers\Joom;


use App\Builders\Product\Providers\ProductJson;
use Illuminate\Support\Str;

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

    protected $streamContextOptions = [
        'de' => [
            'http' => [
                'method' => "GET",
                'header' => "Accept-language: de\r\n" .
                    "Cookie: pref={\"v\":4,\"currency\":\"EUR\",\"language\":\"de\",\"region\":\"UA\"}\r\n" .
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n",
            ],
        ],
        'en' => [
            'http' => [
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "Cookie: pref={\"v\":4,\"currency\":\"USD\",\"language\":\"en\",\"region\":\"UA\"}\r\n" .
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n",
            ],
        ],
    ];

    public function __construct($url, $locale)
    {
        $this->setLocale($locale);
        $this->setUrl($url);
    }

    public function setSku(Sku $sku)
    {
        $this->sku = $sku;
    }

    public function getSku()
    {
        return $this->sku->value;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }


    public function setTitle(Title $title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title->value;
    }

    public function setDescription(Description $description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description->value;
    }

    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setOptions(Option $option)
    {
        $this->options = $option;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setPictures(Picture $pictures)
    {
        $this->pictures = $pictures;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function setMainPictures(MainPicture $pictures)
    {
        $this->mainPictures = $pictures;
    }

    public function getMainPictures()
    {
        return $this->mainPictures;
    }

    public function parse()
    {
        $options = $this->streamContextOptions[$this->getLocale()];
        $page = $this->getWebPage($this->getUrl(), $options);
        $this->setRawData($page['content']);
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

    public function getMetaTags()
    {
        return $this->metaTags;
    }

    public function getProvider()
    {
        return \App\Models\Product::SERVICE_JOOM;
    }

    public function setSeller(Seller $seller)
    {
        $this->seller = $seller;
    }

    public function getSeller()
    {
        return $this->seller;
    }

    public function getRawData(string $key = null)
    {
        return $key ? data_get($this->rawData, $key, []) : $this->rawData;
    }

    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getReview()
    {
        return $this->review;
    }

    public function setReview(ReviewProduct $review)
    {
        $this->review = $review['items'];
    }

    public function getRawProductSKUPropertyList()
    {
        $productSKUPropertyList = [];
        if (array_filter($this->getProductRawData('colorOrder'))) {
            $productSKUPropertyList[] = [
                'skuPropertyId' => 'color',
                'skuPropertyName' => t('Color'),
                'skuPropertyValues' => array_map(function ($item) {
                    $skuPropertyImagePath = $skuPropertyImageSummPath = [];
                    if (in_array(Str::snake(data_get(array_first($item['colors']), 'name')), ['as_in_picture', 'wie_abgebildet'])) {
                        $propertyValueId = Str::snake($item['colorId']);
                        $propertyValueName = Str::title($item['colorId']);
                    } else {
                        $propertyValueId = Str::snake(data_get(array_first($item['colors']), 'name'));
                        $propertyValueName = Str::title(data_get(array_first($item['colors']), 'name'));
                    }
                    if($mainImage = data_get($item, 'mainImage')) {
                        $skuPropertyImagePath = data_get(array_last($mainImage['images']), 'url');
                        $skuPropertyImageSummPath = data_get(array_first($mainImage['images']), 'url');
                    }
                    return [
                        "propertyValueDisplayName" => Str::title(data_get(array_first($item['colors']), 'name')),
                        "propertyValueId" => $propertyValueId,
                        "propertyValueIdLong" => $propertyValueId,
                        "propertyValueName" => $propertyValueName,
                        "skuColorValue" => data_get(array_first($item['colors']), 'rgb'),
                        "skuPropertyImagePath" => $skuPropertyImagePath,
                        "skuPropertyImageSummPath" => $skuPropertyImageSummPath,
                    ];
                }, $this->getProductRawData('variants'))
            ];
        }

        if (array_filter($this->getProductRawData('sizeOrder'))) {
            $productSKUPropertyList[] = [
                'skuPropertyId' => 'size',
                'skuPropertyName' => t('Size'),
                'skuPropertyValues' => array_map(function ($item) {
                    return [
                        "propertyValueDisplayName" => Str::title($item),
                        "propertyValueId" => Str::snake($item),
                        "propertyValueIdLong" => Str::snake($item),
                        "propertyValueName" => Str::title($item),
                    ];
                }, $this->getProductRawData('sizeOrder'))
            ];
        }

        return $productSKUPropertyList;
    }

    public function getRawSkuPriceList()
    {
        $skuPriceList = [];
        foreach ($this->getProductRawData('variants') as $item) {
            $skuAttr = [];
            $skuPropIds = [];
            if(data_get($item, 'colors')) {
                if (in_array(Str::snake(data_get(array_first($item['colors']), 'name')), ['as_in_picture', 'wie_abgebildet'])) {
                    $propertyValueId = Str::snake($item['colorId']);
                } else {
                    $propertyValueId = Str::snake(data_get(array_first($item['colors']), 'name'));
                }

                $skuAttr[] = 'color:' . $propertyValueId;
                $skuPropIds[] = $propertyValueId;
            }
            if(data_get($item, 'size')) {
                $skuAttr[] = 'size:' . Str::snake($item['size']);
                $skuPropIds[] = Str::snake($item['size']);
            }
            $skuPriceList[] = [
                "skuAttr" => implode(';', $skuAttr),
                "skuId" => $item['id'],
                "skuPropIds" => implode(',', $skuPropIds),
                "skuVal" => [
                    "availQuantity" => $item['inventory'],
                    "inventory" => $item['inventory'],
                    "discount" =>  data_get($item, 'discount'),
                    "isActivity" => (data_get($item, 'msrPrice', 0) > data_get($item, 'price', 0)),
                    "skuActivityAmount" => [
                        "currency" => $this->getProductRawData('currency'),
                        "formatedAmount" => currency_format(data_get($item, 'price', 0), $this->getProductRawData('currency')),
                        "value" => data_get($item, 'price', 0),
                    ],
                    "skuAmount" => [
                        "currency" => $this->getProductRawData('currency'),
                        "formatedAmount" => currency_format(data_get($item, 'msrPrice', 0), $this->getProductRawData('currency')),
                        "value" => data_get($item, 'msrPrice', 0),
                    ],
                ],
            ];
        }

        return $skuPriceList;
    }

    public function setFeedbackRating(FeedbackRating $rating)
    {
        $this->rating = $rating;
    }

    public function getFeedbackRating()
    {
        return $this->rating->first();
    }

    public function getProductRawData(string $key = null)
    {
        $productRaw = array_first(data_get($this->getRawData('products'), 'data'));
        return $key ? data_get($productRaw, $key, []) : $productRaw;
    }

    public function setRawData(string $page)
    {
        $this->rawData = [];
        if( preg_match('/\window\.__data\=(.*)\}\}\;/s', $page, $match) ){
            $res = str_replace('undefined', '""', $match[1].'}}');
            $this->rawData = json_decode($res, true);
        }
    }

    public function getRawDataItems(string $key = null)
    {
        $rawData = array_first(data_get($this->getRawData($key), 'data', []));
        return isset($rawData['items']) ? $rawData['items'] : [];
    }

    /**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     * @param $url
     * @param array $options
     * @param bool $proxy
     * @param int $timeout
     * @return mixed
     */
    function getWebPage($url, $options = [], $proxy = false, $timeout = 30): array
    {
        $res['content'] = '';

        if($this->get_http_response_code($url) == "404"){
            echo $url . " error 404" . PHP_EOL;
        }else{
            $context = stream_context_create($options);
            try {
                $res['content'] = file_get_contents($url, false, $context);
            } catch (\Exception $exception) {
                $res['content'] = '';
            }
        }

        return $res;
    }

    function get_http_response_code($url) {
        try {
            $headers = get_headers($url);
            return substr($headers[0], 9, 3);
        } catch (\Exception $exception) {
            return '404';
        }
    }

}