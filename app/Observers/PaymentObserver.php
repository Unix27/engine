<?php

namespace App\Observer;

use App\Models\Language;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Scopes\ActiveScope;
use App\Notifications\PaymentApproved;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class PaymentObserver
{
	/**
	 * Listen to the Entry updating event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function updating(Payment $payment)
	{
		// Get the original object values
		$original = $payment->getOriginal();
		
		if (config('settings.mail.confirmation') == 1) {
			// The Payment was not approved
			if ($original['active'] != 1) {
				if ($payment->active == 1) {
					$post = Post::find($payment->post_id);
					if (!empty($post)) {
						try {
							$post->notify(new PaymentApproved($payment, $post));
						} catch (\Exception $e) {
							flash($e->getMessage())->error();
						}
					}
				}
			}
		}

        if($original['payment_status'] != Payment::STATUS_SUCCESS) {
            if($payment->payment_status == $payment::STATUS_SUCCESS) {
                try {
                    $packageData = [
                        'name' => $payment->transaction_id,
                        'status' => Package::STATUS_NEW,
                        'user_id' => $payment->user_id,
                        'order_id' => $payment->order->id,
                        'active'  => 1,
                    ];

                    $package = Package::create($packageData);
                    foreach ($payment->order->items as $orderItem) {
                        $packageItemData = [
                            'package_id' => $package->id,
                            'post_id' => $orderItem->post_id,
                            'product_id' => $orderItem->product_id,
                            'product_price' => $orderItem->total_price,
                            'product_price_currency_code' => $orderItem->currency->code,
                            'status' => PackageItem::STATUS_NEW,
                            'title' => $orderItem->post->title,
                            'order_item_id' => $orderItem->id,
                            'active' => 1,
                        ];

                        PackageItem::create($packageItemData);
                    }

                    $payment->package_id = $package->id;
                } catch (\Exception $e) {
                    flash($e->getMessage())->error();
                }
            }
        }
	}

	/**
	 * Listen to the Entry saved event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function saved(Payment $payment)
	{
        // Removing Entries from the Cache
        $this->clearCache($payment);
    }
	
	/**
	 * Listen to the Entry deleted event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function deleted(Payment $payment)
	{
		// Removing Entries from the Cache
		$this->clearCache($payment);
	}
	
	/**
	 * Removing the Entity's Entries from the Cache
	 *
	 * @param $payment
	 */
	private function clearCache($payment)
	{
		if (!isset($payment->post) || empty($payment->post)) {
			return;
		}
		
		$post = $payment->post;
		
		Cache::forget($post->country_code . '.sitemaps.posts.xml');
		
		Cache::forget($post->country_code . '.home.getPosts.sponsored');
		Cache::forget($post->country_code . '.home.getPosts.latest');
		
		Cache::forget('post.withoutGlobalScopes.with.city.pictures.' . $post->id);
		Cache::forget('post.with.city.pictures.' . $post->id);
		
		try {
			$languages = Language::withoutGlobalScopes([ActiveScope::class])->get(['abbr']);
		} catch (\Exception $e) {
			$languages = collect([]);
		}
		
		if ($languages->count() > 0) {
			foreach ($languages as $language) {
				Cache::forget('post.withoutGlobalScopes.with.city.pictures.' . $post->id . '.' . $language->abbr);
				Cache::forget('post.with.city.pictures.' . $post->id . '.' . $language->abbr);
			}
		}
		
		Cache::forget('posts.similar.category.' . $post->category_id . '.post.' . $post->id);
		Cache::forget('posts.similar.city.' . $post->city_id . '.post.' . $post->id);
	}
}
