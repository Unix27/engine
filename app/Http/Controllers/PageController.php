<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayHelper;
use App\Http\Requests\ContactRequest;
use App\Models\City;
use App\Models\Page;
use App\Models\Permission;
use App\Models\User;
use App\Notifications\FormSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class PageController extends FrontController
{
	/**
	 * ReportController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
        if (request()->has('clickid')) {
            $landing = request()->segment(1);
            $secure = '';
            switch ($landing) {
                case 'subscribe-galaxy':
                    $secure = '5b9770c03c1e086f9a57724c9b7e848c';
                    break;
                case 'subscribe-iphone':
                    $secure = '32cca8188a2b861672dd197696dd5de5';
                    break;
                case 'subscribe-iphone-pro':
                    $secure = 'addc1a0c4bc6ae6bebdaeff31e278d66';
                    break;
                case 'subscribe-iphone-fra':
                    $secure = '18b80d4c33643efb77c679811a0524ed';
                    break;
                case 'subscribe-amazon':
                    $secure = '7b17fd3840be109f46d4d014e611dfb8';
                    break;
                case 'subscribe-paypal':
                    $secure = 'f3ce94b1bae4d8f0c90cf0a28b4009a6';
                    break;
                case 'subscribe-amaz1uk':
                    $secure = 'ac32ebfabfb2aff09e24ef1613247689';
                    break;
                case 'subscribe-paypaluk':
                    $secure = '5230da76eda508d4e9f086a58e5cd3c0';
                    break;
                case 'subscribe-paypal-en':
                    $secure = 'f6c1ec67c58db94cedbeee87eae8c54e';
                    break;
            }

            $expire = 60 * 24 * 7; // 7 days
            Cookie::queue(
                Cookie::make('clickid', request()->get('clickid'), $expire)
            );
            Cookie::queue(
                Cookie::make('secure', $secure, $expire)
            );
        }
	}
	
	/**
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
	 */
	public function index($slug)
	{
		// Get the Page
		$page = Page::where('slug', $slug)->trans()->first();
		if (empty($page)) {
			abort(404);
		}
		view()->share('page', $page);
		view()->share('uriPathPageSlug', $slug);
		
		// Check if an external link is available
		if (!empty($page->external_link)) {
			return headerLocation($page->external_link);
		}
		
		// SEO
		$title = $page->title;
		$description = Str::limit(str_strip($page->content), 200);
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		// Open Graph
		$this->og->title($title)->description($description);
		if (!empty($page->picture)) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
			$this->og->image(imgUrl($page->picture, 'page'), [
				'width'  => 600,
				'height' => 600,
			]);
		}
		view()->share('og', $this->og);
		
		return view('pages.index');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function contact()
	{
		// Get the Country's largest city for Google Maps
		$city = City::currentCountry()->orderBy('population', 'desc')->first();
		view()->share('city', $city);
		
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'contact'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'contact')));
		MetaTag::set('keywords', getMetaTag('keywords', 'contact'));
		
		return view('pages.contact');
	}
	
	/**
	 * @param ContactRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function contactPost(ContactRequest $request)
	{
		// Store Contact Info
		$contactForm = $request->all();
		$contactForm['country_code'] = config('country.code');
		$contactForm['country_name'] = config('country.name');
		$contactForm = ArrayHelper::toObject($contactForm);
		
		// Send Contact Email
		try {
			if (config('settings.app.email')) {
				Notification::route('mail', config('settings.app.email'))->notify(new FormSent($contactForm));
			} else {
				$admins = User::permission(Permission::getStaffPermissions())->get();
				if ($admins->count() > 0) {
					Notification::send($admins, new FormSent($contactForm));
					/*
                    foreach ($admins as $admin) {
						Notification::route('mail', $admin->email)->notify(new FormSent($contactForm));
                    }
					*/
				}
			}
			flash(t("Your message has been sent to our moderators. Thank you"))->success();
		} catch (\Exception $e) {
			flash($e->getMessage())->error();
		}
		
		return redirect(config('app.locale') . '/' . trans('routes.contact'));
	}

	public function invite_galaxy(Request $request)
    {
        return view('invites.galaxy');
    }

    public function invite_amazon(Request $request)
    {
        return view('invites.amazon');
    }

    public function invite_paypal(Request $request)
    {
        return view('invites.paypal');
    }

    public function invite_amaz1uk(Request $request)
    {
        return view('invites.amaz1uk');
    }

    public function invite_paypaluk(Request $request)
    {
        return view('invites.paypal-uk');
    }

    public function invite_iphone(Request $request)
    {
        return view('invites.iphone');
    }

    public function invite_iphone_pro(Request $request)
    {
        return view('invites.iphone-pro');
    }

    public function invite_iphone_fra(Request $request)
    {
        return view('invites.iphone-fra');
    }

    public function invite_paypal_en(Request $request)
    {
        return view('invites.paypal-en');
    }
}
