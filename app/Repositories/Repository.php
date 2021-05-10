<?php


namespace App\Repositories;


use App\Builders\Product\Providers\ProductJson;
use App\Models\Category;
use App\Models\City;
use App\Models\Field;
use App\Models\FieldOption;
use App\Models\Picture;

use App\Models\PostType;
use App\Models\PostValue;
use App\Models\Product;
use App\Models\ProductFeedbackRating;
use App\Models\ProductField;
use App\Models\ProductFieldOption;
use App\Models\ProductOptValPrice;
use App\Models\ProductSeller;
use App\Models\ReviewPicture;
use App\Models\ReviewVideo;
use App\Models\Scopes\ActiveScope;
use App\Models\Video;
use App\Plugins\reviews\app\Models\Post;
use App\Plugins\reviews\app\Models\Review;
use Dan\UploadImage\Exceptions\UploadImageException;
use Dan\UploadImage\UploadImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Url\Url;

class Repository
{
    protected $postModel;
    protected $productModel;
    /**
     * @param ProductJson $product
     * @param array $transProduct
     * @param int|null $categoryId
     * @param int|null $postId
     */
    public function process(ProductJson $product, array $transProduct = [], int $categoryId = null, int $postId = null)
    {
        if(!$categoryId) {
            $categoryId = $this->getDefaultCategoryId($categoryId);
        }

        $this->syncPost($product, $categoryId, $postId, $transProduct);
        $this->archivePost();
        $this->syncProduct($product, $transProduct);
        $this->syncProductRatings($product);
        $this->syncReviews($product);
        foreach ($transProduct as $locale => $tProduct) {
            $this->syncReviews($tProduct, $locale);
        }

        if($product->getOptions() && $product->getOptions()->getProductSKUPropertyList()->count() > 0) {
            $this->syncOptions($product->getOptions(), $transProduct);
            $this->syncProductOptionPrices($product, $transProduct);
            if($product->getOptions()->getProductSKUPropertyList())
            $this->syncPostValues($product->getOptions()->getProductSKUPropertyList());
        }

        $this->unArchivePost();
//        $this->clearCache();
    }

    /**
     * @param ProductJson $product
     * @return Product|bool|\Illuminate\Database\Eloquent\Model
     */
    public function create(ProductJson $product)
    {
        return Product::create(
            [
                'post_id' => $this->postModel->id,
                'title' => $product->getTitle(),
                'description' => $product->getDescription(),
                'sku' => $product->getSku(),
                'category_id' => $product->getCategory()->get('id'),
                'seller_id' => $this->getProductSeller($product->getSeller())->id,
                'formated_activity_price' => $product->getPrice()->get('formatedActivityPrice'),
                'formated_price' => $product->getPrice()->get('formatedPrice'),
                'max_activity_amount' => $product->getPrice()->get('maxActivityAmount')->get('value'),
                'max_amount' => $product->getPrice()->get('maxAmount')->get('value'),
                'min_activity_amount' => $product->getPrice()->get('minActivityAmount')->get('value'),
                'min_amount' => $product->getPrice()->get('minAmount')->get('value'),
                'discount' => $product->getPrice()->get('discount'),
                'discount_promotion' => $product->getPrice()->get('discountPromotion'),
                'activity' => $product->getPrice()->get('activity'),
                'big_preview' => $product->getPrice()->get('bigPreview'),
                'big_sell_product' => $product->getPrice()->get('bigPreview'),
                'url' => $product->getUrl(),
                'provider' => $product->getProvider(),
                'total_avail_quantity' => $product->getStatus()->get('totalAvailQuantity'),
                'in_stock'  => $product->getStatus()->get('itemStatus'),
                'picture_url' => $product->getMainPictures()->get('main_picture'),
                'picture_url_thumbnail' => $product->getMainPictures()->get('main_picture_thumbnail'),
                'active' => 1
            ]
        );
    }

    /**
     * @param ProductJson $product
     * @param string $locale
     * @return mixed
     */
    public function update(ProductJson $product, string $locale = 'de')
    {
        return Product::findTrans($this->productModel->tid, $locale)->update(
            [
                'title' => $product->getTitle(),
                'description' => $product->getDescription(),
                'seller_id' => $this->getProductSeller($product->getSeller())->id,
                'formated_activity_price' => $product->getPrice()->get('formatedActivityPrice'),
                'formated_price' => $product->getPrice()->get('formatedPrice'),
                'max_activity_amount' => $product->getPrice()->get('maxActivityAmount')->get('value'),
                'max_amount' => $product->getPrice()->get('maxAmount')->get('value'),
                'min_activity_amount' => $product->getPrice()->get('minActivityAmount')->get('value'),
                'min_amount' => $product->getPrice()->get('minAmount')->get('value'),
                'total_avail_quantity' =>  $product->getStatus()->get('totalAvailQuantity'),
                'discount' => $product->getPrice()->get('discount'),
                'in_stock'  => $product->getStatus()->get('itemStatus'),
                'url' => $product->getUrl(),
                'active' => 1,
            ]
        );
    }

    public function delete()
    {

    }

    /**
     * @param ProductJson $product
     * @param array $transProduct
     * @return Product|bool|\Illuminate\Database\Eloquent\Model|null
     */
    public function syncProduct(ProductJson $product, array $transProduct = [])
    {
        $provider = $product->getProvider();
        $this->productModel = Product::withoutGlobalScopes([ActiveScope::class])
            ->$provider()
            ->where(['post_id' => $this->postModel->id, 'sku' => $product->getSku()])
            ->first();

        if(!$this->productModel) {
            $this->productModel = $this->create($product);
            foreach ($transProduct as $locale => $transProductItem) {
                $this->update($transProductItem, $locale);
            }
        } else {
            $this->update($product);
            foreach ($transProduct as $locale => $transProductItem) {
                $this->update($transProductItem, $locale);
            }
        }

        return $this->productModel->fresh();
    }

    /**
     * @param ProductJson $product
     * @param $categoryId
     * @param null $postId
     * @param array $transProduct
     * @throws UploadImageException
     */
    public function syncPost(ProductJson $product, $categoryId, $postId = null, array $transProduct = [])
    {
        if($postId) {
            $this->postModel = Post::find($postId);
            if($product->getMetaTags()) {
                if(!$this->postModel->tags) {
                    $this->postModel->update([
                        'tags' => $product->getMetaTags()->get('keywords'),
                    ]);
                }

                foreach ($transProduct as $locale => $transProductItem) {
                    $field = 'tags_'. $locale;
                    if($this->postModel->isFillable($field)) {
                        $this->postModel->update([
                            $field => $product->getMetaTags()->get('keywords'),
                        ]);
                    }
                }
            }

            if(!$this->postModel->pictures->count()) {
                $this->createPostPictures($product);
            }

            if(!$this->postModel->video->count()) {
                $this->createPostVideo($product);
            }
        } else {
            $this->postModel = Post::create(
                [
                    'category_id' => $categoryId,
                    'title' => $product->getTitle(),
                    'description' => $product->getDescription(),
                    'tags' => $product->getMetaTags() ? $product->getMetaTags()->get('keywords') : null,
                    'contact_name' => 'PARSER',
                    'post_type_id' => $this->getDefaultPostTypeId(),
                    'country_code' => 'DE',
                    'city_id' => $this->getDefaultCityId(),
                    'verified_email' => 1,
                    'verified_phone' => 1,
                    'reviewed' => 1,
                    'email' => 'joom@gmail.com',

                ]
            );

            foreach ($transProduct as $locale => $transProductItem) {
                $title = 'title_'. $locale;
                $description = 'description_' . $locale;
                if($this->postModel->isFillable($title) && $this->postModel->isFillable($description)) {
                    $this->postModel->update([
                        $title => $transProductItem->getTitle(),
                        $description => $transProductItem->getDescription(),
                    ]);
                }
            }

            $this->createPostPictures($product);
            $this->createPostVideo($product);
        }
    }

    public function syncReviews(ProductJson $product, $locale = 'de')
    {
        if(!$product->getReview()) return;

        $postReviews = $this->postModel->reviews;
        foreach ($product->getReview() as $review) {
            if(empty($review->text) && empty($review->media)) continue;
            $postReview = $postReviews->where('joom_review_id', $review->id);
            if (empty($postReview) or $postReview->count() == 0) {
                $reviewModel = Review::create([
                    'translation_lang' => $locale,
                    'post_id' => $this->postModel->id,
                    'user_name' => $review->get('user')->fullName,
                    'joom_review_id' => $review->id,
                    'rating' => $review->starRating,
                    'comment' => $review->text,
                    'approved' => 1,
                    'spam' => 0,
                    'created_at' => \Carbon\Carbon::parse($review->created_at)->timestamp,
                ]);

                if($review->get('media')) {
                    foreach ($review->get('media') as $media) {
                        if($media->type == 'image') {
                            ReviewPicture::create(
                                [
                                    'review_id' => $reviewModel->id,
                                    'picture_url' => $media->payload['image'],
                                    'picture_url_thumbnail' => $media->payload['thumbnail'],
                                ]
                            );
                        }

                        if($media->type == 'video') {
                            ReviewVideo::create(
                                [
                                    'review_id' => $reviewModel->id,
                                    'video_url' => $media->payload['streamUrl'],
                                    'picture_url_thumbnail' => $media->payload['thumbnail'],
                                ]
                            );
                        }
                    }
                }
            }
        }
    }

    /**
     * @param ProductJson $product
     * @throws UploadImageException
     */
    public function createPostVideo(ProductJson $product)
    {
        if($product->getPictures()->videoUrl) {
            $picturesDefaultConfig = [
                'thumbnail_status' => false,
                'baseStore' => '/storage/pictures/files/de/',
                'original' => '',
                'originalResize' => 1024,
                'quality' => 100,
                'thumbnails' => '',
                'watermark_path' => '/storage/' . config('settings.app.favicon'),
                'watermark_video_path' => '',
                'watermark_text' => config('app.name'),
                'min_width' => 50,
                'previewWidth' => '',
                'editor_folder' => '',
            ];

            $uploader = new UploadImage($picturesDefaultConfig);
            $image = $uploader->upload(array_first($product->getPictures()->imagePathList), '', true)->getImageName();

            Video::create([
                'post_id' => $this->postModel->id,
                'filename' => $image,
                'product_video_url' => $product->getPictures()->videoUrl,
                'product_picture_url' => array_first($product->getPictures()->imagePathList),
                'product_picture_url_thumbnail' => array_first($product->getPictures()->summImagePathList),
                'active' => 1,
            ]);
        }
    }

    /**
     * @param ProductJson $product
     */
    public function createPostPictures(ProductJson $product)
    {
        $picturesDefaultConfig = [
            'thumbnail_status' => false,
            'baseStore' => '/storage/pictures/files/de/',
            'original' => '',
            'originalResize' => 1024,
            'quality' => 100,
            'thumbnails' => '',
            'watermark_path' => '/storage/' . config('settings.app.favicon'),
            'watermark_video_path' => '',
            'watermark_text' => config('app.name'),
            'min_width' => 50,
            'previewWidth' => '',
            'editor_folder' => '',
        ];
        $uploader = new UploadImage($picturesDefaultConfig);
        foreach ($product->getPictures()->imagePathList as $key => $url) {
            try {
                // Upload and save image.
                $image = $uploader->upload($url, '', true)->getImageName();
                $pictureModel = Picture::create(
                    [
                        'post_id' => $this->postModel->id,
                        'product_picture_url' => $url,
                        'product_picture_url_thumbnail' => $product->getPictures()->summImagePathList[$key],
                        'provider' => $product->getProvider(),
                        'active' => 1,
                    ]
                );
                $pictureModel->filename = $image;
                $pictureModel->save();
            } catch (UploadImageException $e) {
                echo 'Picture upload error: ' . $e->getMessage() . PHP_EOL;
            }
        }
    }

    /**
     *
     */
    public function archivePost()
    {
        $this->postModel->update([
            'archived' => 1,
        ]);

    }

    /**
     *
     */
    public function unArchivePost()
    {
        $this->postModel->update([
            'archived' => 0,
        ]);
    }

    /**
     * @param $data
     * @return ProductSeller|bool|\Illuminate\Database\Eloquent\Model
     */
    public function getProductSeller($data)
    {
        $sellerModel = ProductSeller::where(['store_num' => $data->getStoreNum()])->first();
        if($sellerModel) {
            $sellerModel->update(
                [
                    'positive_num' => $data->getPositiveNum(),
                    'positive_rate' => $data->getPositiveRate(),
                    'top_rated_seller' => $data->getTopRatedSeller(),
                ]
            );
        } else {
            $sellerModel = ProductSeller::create(
                [
                    'store_num' => $data->getStoreNum(),
                    'name' => $data->getStoreName(),
                    'positive_num' => $data->getPositiveNum(),
                    'positive_rate' => $data->getPositiveRate(),
                    'open_at'   => $data->getOpenAt(),
                    'location' => $data->getLocation(),
                    'seller_admin_seq' => $data->getSellerAdminSeq(),
                    'store_url' => $data->getStoreUrl(),
                    'top_rated_seller' => $data->getTopRatedSeller(),
                    'provider' => $data->getProvider()
                ]
            );
        }

        return $sellerModel;
    }

    public function syncPostValues(Collection $values)
    {
        $provider = $values->first()->getProvider();
        foreach (PostValue::$provider()->wherePostId($this->postModel->id)->get() as $oldPostValue) {
            $oldPostValue->delete();
        }

        $picturesDefaultConfig = [
            'thumbnail_status' => false,
            'baseStore' => '/storage/pictures/files/de/',
            'original' => '',
            'originalResize' => 1024,
            'quality' => 100,
            'thumbnails' => '',
            'watermark_path' => '/storage/' . config('settings.app.favicon'),
            'watermark_video_path' => '',
            'watermark_text' => config('app.name'),
            'min_width' => 50,
            'previewWidth' => '',
            'editor_folder' => '',
        ];
        
        $uploader = new UploadImage($picturesDefaultConfig);

        foreach ($values as $value) {
            $productField = ProductField::$provider()
                ->with(['field'])
                ->where(['sku_property_id' =>  $value->getSkuPropertyId()])
                ->first();

            if(!$productField) continue;

            foreach ($value->getSkuPropertyValues() as $propertyValue) {
                $productFieldOption = ProductFieldOption::$provider()->where([
                    'sku_property_id' => $value->getSkuPropertyId(),
                    'property_value_id' => $propertyValue->getPropertyValueId(),
                    'value' => Str::title($propertyValue->getPropertyValueDisplayName()),
                ])->first();

                if(!$productFieldOption) continue;
                $postPicture = null;
                if(is_string($propertyValue->getSkuPropertyImagePath())) {
                    try {
                        $productPictureUrl = $propertyValue->getSkuPropertyImagePath();
                        $productPictureUrlThumbnail = $propertyValue->getSkuPropertyImageSummPath();

                        $postPicture = Picture::where([
                            'post_id' => $this->postModel->id,
                            'product_picture_url' => $provider == 'aliexpress' ? substr($productPictureUrl,0, strrpos($productPictureUrl, '_')) : $productPictureUrl,
                        ])->first();

                        if(!$postPicture && in_array($value->getSkuPropertyName(), ['Color', 'Farbe'])) {
                            $url = ($provider == 'aliexpress' ? substr($productPictureUrl,0, strrpos($productPictureUrl, '_')) : $productPictureUrl);
                            $image = $uploader->upload($url, '', true)->getImageName();

                            $postPicture = Picture::create(
                                [
                                    'post_id' => $this->postModel->id,
                                    'filename' => $image,
                                    'product_picture_url' => $provider == 'aliexpress' ? substr($productPictureUrl,0, strrpos($productPictureUrl, '_')) : $productPictureUrl,
                                    'product_picture_url_thumbnail' => is_string($productPictureUrlThumbnail) ? $productPictureUrlThumbnail : $productPictureUrl,
                                    'provider' => $provider,
                                    'active' => 1,
                                ]
                            );
                        }

                    } catch (\Exception $exception) {
                        echo $exception->getMessage();
                    }

                }

                PostValue::create([
                    'post_id' => $this->postModel->id,
                    'field_id' => $productField->field_id,
                    'option_id' => $productFieldOption->option_id,
                    'value' => (in_array($value->getSkuPropertyName(), ['Color', 'Farbe']) && !$propertyValue->getSkuColorValue() && $propertyValue->getSkuPropertyImagePath()) ? 'as in picture' : null,
                    'product_picture_url' => $propertyValue->getSkuPropertyImagePath(),
                    'product_picture_url_thumbnail' => is_string($propertyValue->getSkuPropertyImageSummPath()) ? $propertyValue->getSkuPropertyImageSummPath() : null,
                    'picture_id' => $postPicture ? $postPicture->id : null,
                    'provider' => $propertyValue->getProvider(),
                    'product_field_option_id' => $productFieldOption->id,
                ]);
            }
        }
    }

    /**
     * @param Product $productModel
     * @param ProductJson $product
     * @param array $transProduct
     */
    public function syncProductOptionPrices(ProductJson $product, array $transProduct = [])
    {
        $oldOptValPrices = ProductOptValPrice::withoutGlobalScopes([ActiveScope::class])
            ->whereProductId([$this->productModel->tid])
            ->get();

        foreach ($oldOptValPrices as $oldOptValPrice) {
            $oldOptValPrice->delete();
        }

        foreach ($product->getOptions()->getSkuPriceList() as $skuPrice) {
            $optValPriceModel = ProductOptValPrice::create([
                'product_id' => $this->productModel->tid,
                'post_id' => $this->postModel->id,
                'sku_attr' => $skuPrice->getSkuAttr(),
                'sku_prop_ids'  => $skuPrice->getSkuPropIds(),
                'act_sku_cal_price' => $skuPrice->getSkuVal()->getActSkuCalPrice(),
                'act_sku_multi_currency_cal_price' => $skuPrice->getSkuVal()->getActSkuMultiCurrencyCalPrice(),
                'act_sku_multi_currency_display_price' => $skuPrice->getSkuVal()->getActSkuMultiCurrencyDisplayPrice(),
                'sku_activity_amount' => $skuPrice->getSkuVal()->getSkuActivityAmount()->getValue(),
                'formated_sku_activity_amount' => $skuPrice->getSkuVal()->getSkuActivityAmount()->getFormatedAmount(),
                'sku_amount' => $skuPrice->getSkuVal()->getSkuAmount()->getValue(),
                'formated_sku_amount' => $skuPrice->getSkuVal()->getSkuAmount()->getFormatedAmount(),
                'sku_cal_price' => $skuPrice->getSkuVal()->getSkuCalPrice(),
                'sku_multi_currency_cal_price'  => $skuPrice->getSkuVal()->getActSkuMultiCurrencyCalPrice(),
                'discount' => $skuPrice->getSkuVal()->getDiscount(),
                'is_activity' => $skuPrice->getIsActivity(),
                'avail_quantity' => $skuPrice->getSkuVal()->getAvailQuantity(),
                'inventory' => $skuPrice->getSkuVal()->getInventory(),
                'active' => 1,
            ]);

            foreach ($transProduct as $locale => $transProductItem) {
                $transSkuPriceList = $transProductItem->getOptions()->getSkuPriceList();
                $transSkuPrice = $transSkuPriceList
                    ->where('skuId', $skuPrice->getSkuId())
                    ->where('skuAttr', $skuPrice->getSkuAttr())
                    ->where('skuPropIds', $skuPrice->getSkuPropIds())
                    ->first();

                if($transSkuPrice) {
                    ProductOptValPrice::findTrans($optValPriceModel->tid, $locale)
                        ->update([
                            'act_sku_cal_price' => $transSkuPrice->getSkuVal()->getActSkuCalPrice(),
                            'act_sku_multi_currency_cal_price' => $transSkuPrice->getSkuVal()->getActSkuMultiCurrencyCalPrice(),
                            'act_sku_multi_currency_display_price' => $transSkuPrice->getSkuVal()->getActSkuMultiCurrencyDisplayPrice(),
                            'sku_activity_amount' => $transSkuPrice->getSkuVal()->getSkuActivityAmount()->getValue(),
                            'formated_sku_activity_amount' => $transSkuPrice->getSkuVal()->getSkuActivityAmount()->getFormatedAmount(),
                            'sku_amount' => $transSkuPrice->getSkuVal()->getSkuAmount()->getValue(),
                            'formated_sku_amount' => $transSkuPrice->getSkuVal()->getSkuAmount()->getFormatedAmount(),
                            'sku_cal_price' => $transSkuPrice->getSkuVal()->getSkuCalPrice(),
                            'sku_multi_currency_cal_price'  => $transSkuPrice->getSkuVal()->getActSkuMultiCurrencyCalPrice(),
                            'discount' => $skuPrice->getSkuVal()->getDiscount(),
                            'is_activity' => $transSkuPrice->getIsActivity(),
                            'avail_quantity' => $transSkuPrice->getSkuVal()->getAvailQuantity(),
                            'inventory' => $transSkuPrice->getSkuVal()->getInventory(),
                        ]);
                }
            }
        }
    }

    /**
     * @param $data
     * @param array $transProduct
     */
    public function syncOptions($data, array $transProduct = [])
    {
        $transOptions = [];
        foreach ($transProduct as $locale => $item) {
            $transOptions[$locale] = $item->getOptions();
        }

        foreach ($data->getProductSKUPropertyList() as $keyProperty => $property) {
            $provider = $property->getProvider();
            $field = Field::firstOrCreate([
                'belongs_to' => 'posts',
                'name' => $property->getSkuPropertyName(),
                'type' => 'select',
                'active' => 1
            ]);

            $productField = ProductField::$provider()->where([
                    'field_id' => $field->tid,
                    'sku_property_id' => $property->getSkuPropertyId(),
                ])->first();

            if(!$productField) {
                $productField = ProductField::create([
                    'field_id' => $field->tid,
                    'sku_property_id' => $property->getSkuPropertyId(),
                    'name' => $property->getSkuPropertyName(),
                    'provider' => $provider,
                ]);
            }

            if($field->wasRecentlyCreated) {
                foreach ($transOptions as $locale => $item) {
                    $transItem = $item->getProductSKUPropertyList()
                        ->where('skuPropertyId' , $property->getSkuPropertyId())
                        ->first();

                    if($transItem) {
                        Field::findTrans($field->tid, $locale)->update(
                            [
                                'name' => $transItem->getSkuPropertyName(),
                            ]
                        );
                    }
                }

            }

            foreach ($property->getSkuPropertyValues() as $keyPropertyValue => $propertyValue) {
                $fieldOption = FieldOption::firstOrCreate([
                    'field_id' => $field->tid,
                    'value' => ( in_array(Str::lower($propertyValue->getPropertyValueDisplayName()), ['as in picture', 'wie abgebildet']) ? $propertyValue->getPropertyValueName() : $propertyValue->getPropertyValueDisplayName())
                ]);

                $productFieldOption = ProductFieldOption::$provider()->where([
                    'option_id' => $fieldOption->tid,
                    'sku_property_id' => $property->getSkuPropertyId(),
                    'property_value_id' => $propertyValue->getPropertyValueId(),
                ])->first();

                if(!$productFieldOption) {
                    ProductFieldOption::create([
                        'option_id' => $fieldOption->tid,
                        'sku_property_id' => $property->getSkuPropertyId(),
                        'property_value_id' => $propertyValue->getPropertyValueId(),
                        'value' => $propertyValue->getPropertyValueDisplayName(),
                        'provider' => $provider,
                    ]);
                }

                if($fieldOption->wasRecentlyCreated) {
                    foreach ($transOptions as $locale => $item) {
                        $transPropertyItem = $item->getProductSKUPropertyList()
                            ->where('skuPropertyId' , $property->getSkuPropertyId())
                            ->first();

                        $transValueItem = $transPropertyItem->getSkuPropertyValues()
                            ->where('propertyValueId' , $propertyValue->getPropertyValueId())
                            ->first();

                        if($transValueItem) {
                            FieldOption::findTrans($fieldOption->tid, $locale)->update([
                                'value' => $transValueItem->getPropertyValueDisplayName(),
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function syncProductRatings(ProductJson $product)
    {
        $productRatings = $product->getFeedbackRating();
        if($productRatings->count() > 0) {
            $ratings = ProductFeedbackRating::firstOrCreate(['product_id' => $this->productModel->id]);
            $ratings->update(collect($productRatings)->mapKeysToSnakeCase()->toArray());
        }
    }

    /**
     * @param null $categoryId
     * @return mixed
     */
    public function getDefaultCategoryId($categoryId = null)
    {
        if(!$categoryId) {
            return Category::withoutGlobalScopes([ActiveScope::class])->whereName('Unsorted Products')->value('id');
        } else {
            return Category::find($categoryId)->id;
        }
    }

    /**
     * @return mixed
     */
    public function getDefaultCityId()
    {
        return City::whereName('Berlin')->value('id');
    }

    /**
     * @return mixed
     */
    public function getDefaultPostTypeId()
    {
        return PostType::whereName('Professional')->value('id');
    }

    /**
     * Removing the Entity's Entries from the Cache
     *
     * @param $category
     */
    private function clearCache()
    {
        Cache::flush();
    }
}