<?php

namespace App\Observer;

use App\Models\Product;
use App\Models\ProductFeedbackRating;
use App\Models\ProductOptValPrice;
use App\Models\Scopes\ActiveScope;


class ProductObserver extends TranslatedModelObserver
{
//    use TrackingHistoryTrait;
//
//    public function updating(Product $product)
//    {
//        $this->track($product);
//    }

    /**
     * Listen to the Entry deleting event.
     *
     * @param Product $product
     * @return void
     */
    public function deleting($product)
    {
        parent::deleting($product);
        ProductOptValPrice::withoutGlobalScopes([ActiveScope::class])->where(['product_id' => $product->id])->delete();
        ProductFeedbackRating::where(['product_id' => $product->id])->delete();
    }
}
