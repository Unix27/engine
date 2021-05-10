<?php

namespace App\Http\Controllers\Post;

use App\Events\PostWasVisited;
use App\Helpers\ArrayHelper;
use App\Helpers\UrlGen;
use App\Http\Controllers\Post\Traits\CustomFieldTrait;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\SendMessageRequest;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Message;
use App\Models\Package;
use App\Http\Controllers\FrontController;
use App\Models\Product;
use App\Models\ProductFieldOption;
use App\Models\ProductOptValPrice;
use App\Models\User;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ReviewedScope;
use App\Notifications\SellerContacted;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Helpers\Localization\Helpers\Country as CountryLocalizationHelper;
use App\Helpers\Localization\Country as CountryLocalization;
use function GuzzleHttp\Promise\all;

class DetailsController extends FrontController
{
	use CustomFieldTrait;
	
	/**
	 * Post expire time (in months)
	 *
	 * @var int
	 */
	public $expireTime = 24;
	
	/**
	 * DetailsController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		// From Laravel 5.3.4 or above
		$this->middleware(function ($request, $next) {
			$this->commonQueries();
			
			return $next($request);
		});
	}
	
	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		// Check Country URL for SEO
		$countries = CountryLocalizationHelper::transAll(CountryLocalization::getCountries());
		view()->share('countries', $countries);
		
		// Count Packages
		$countPackages = Package::trans()->applyCurrency()->count();
		view()->share('countPackages', $countPackages);
		
		// Count Payment Methods
		view()->share('countPaymentMethods', $this->countPaymentMethods);
	}

    /**
     * Show Dost's Details.
     *
     * @param $postId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
	public function index($postId)
	{
		$data = [];
		
		// Get and Check the Controller's Method Parameters
		$parameters = request()->route()->parameters();
		
		// Show 404 error if the Post's ID is not numeric
		if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
			abort(404);
		}
		
		// Set the Parameters
		$postId = $parameters['id'];
		if (isset($parameters['slug'])) {
			$slug = $parameters['slug'];
		}
		
		// GET POST'S DETAILS
		if (auth()->check()) {
			// Get post's details even if it's not activated and reviewed
			$cacheId = 'post.withoutGlobalScopes.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post    = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
					->withCountryFix()
					->unarchived()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'pictures',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
					])
					->first();
			});
			
			// If the logged user is not an admin user...
			if (!auth()->user()->can(Permission::getStaffPermissions())) {
				// Then don't get post that are not from the user
				if (!empty($post) && $post->user_id != auth()->user()->id) {
					$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
					$post    = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
						return Post::withCountryFix()
							->unarchived()
							->where('id', $postId)
							->with([
								'category'      => function ($builder) { $builder->with(['parent']); },
								'postType',
								'city',
								'pictures',
								'latestPayment' => function ($builder) { $builder->with(['package']); },
							])
							->first();
					});
				}
			}
		} else {
			$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post    = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withCountryFix()
					->unarchived()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'pictures',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
					])
					->first();
			});
		}
		// Preview Post after activation
		if (request()->filled('preview') && request()->get('preview') == 1) {
			// Get post's details even if it's not activated and reviewed
			$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
				->withCountryFix()
				->where('id', $postId)
				->with([
					'category'      => function ($builder) { $builder->with(['parent']); },
					'postType',
					'city',
					'pictures',
					'latestPayment' => function ($builder) { $builder->with(['package']); },
				])
				->first();
		}
		
		// Post not found
		if (empty($post) || empty($post->category) || empty($post->postType) || empty($post->city)) {
			abort(404, t('Post not found'));
		}
		
		// Share post's details
		view()->share('post', $post);
		
		// Get possible post's Author (User)
		$user = null;
		if (isset($post->user_id) && !empty($post->user_id)) {
			$user = User::find($post->user_id);
		}
		view()->share('user', $user);
		
		// Get user picture
		$userPhoto = (!empty($post->email)) ? Gravatar::fallback(url('images/user.jpg'))->get($post->email) : null;
		if (isset($user) && !empty($user) && isset($user->photo) && !empty($user->photo)) {
			$userPhoto = imgUrl($user->photo);
		}
		view()->share('userPhoto', $userPhoto);
		
		// Get Post's user decision about comments activation
		$commentsAreDisabledByUser = false;
		if (isset($user) && !empty($user)) {
			if ($user->disable_comments == 1) {
				$commentsAreDisabledByUser = true;
			}
		}
		view()->share('commentsAreDisabledByUser', $commentsAreDisabledByUser);

		// Increment Post visits counter
		Event::dispatch(new PostWasVisited($post));
		
		// GET SIMILAR POSTS
		if (config('settings.single.similar_posts') == '1') {
			$cacheId = 'posts.similar.category.' . $post->category->tid . '.post.' . $post->id . 'page.' . request()->get('page', 0);
			$posts   = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post) {
				return $post->getSimilarByCategory();
			});
			
			// Featured Area Data
			$featured         = [
				'title' => t('Similar Ads'),
				'link'  => qsurl(trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except('c'), ['c' => $post->category->tid])),
				'posts' => $posts,
			];
			$data['featured'] = (count($posts) > 0) ? ArrayHelper::toObject($featured) : null;
            if(request()->ajax() && request()->has('show_more')) {
                if(!empty($data['featured']->posts)) {
                    $view = view('home.inc.latestItems', ['posts' => (array) $data['featured']->posts, 'block_title' => t('Similar products')])->render();
                    return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
                } else {
                    return response()->json(['html' => ''], 200, [], JSON_UNESCAPED_UNICODE);
                }
            }
		} else if (config('settings.single.similar_posts') == '2') {
			$distance = 50; // km OR miles
			
			$cacheId = 'posts.similar.city.' . $post->city->id . '.post.' . $post->id;
			$posts   = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post, $distance) {
				return $post->getSimilarByLocation($distance);
			});
			
			// Featured Area Data
			$featured         = [
				'title' => t('More ads at :distance :unit around :city', [
					'distance' => $distance,
					'unit'     => getDistanceUnit(config('country.code')),
					'city'     => $post->city->name,
				]),
				'link'  => qsurl(trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except(['l', 'location']), ['l' => $post->city->id])),
				'posts' => $posts,
			];
			$data['featured'] = (count($posts) > 0) ? ArrayHelper::toObject($featured) : null;
		}
		
		// SEO
		$title       = $post->title;
		$description = Str::limit(str_strip(strip_tags($post->description)), 200);
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		if (!empty($post->tags)) {
			MetaTag::set('keywords', str_replace(',', ', ', $post->tags));
		}
		
		// Open Graph
		$this->og->title($title)
			->description($description)
			->type('article');
		if (!$post->pictures->isEmpty()) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
			foreach ($post->pictures as $picture) {
				$this->og->image(imgUrl($picture->filename, 'big'), [
					'width'  => 600,
					'height' => 600,
				]);
			}
		}
		view()->share('og', $this->og);
		
		/*
		// Expiration Info
		$today = Date::now(config('timezone.id'));
		if ($today->gt($post->created_at->addMonths($this->expireTime))) {
			flash(t("Warning! This ad has expired. The product or service is not more available (may be)"))->error();
		}
		*/
		
		// Reviews Plugin Data
		if (config('plugins.reviews.installed')) {
			try {
				$rvPost = \App\Plugins\reviews\app\Models\Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->find($post->id);
				view()->share('rvPost', $rvPost);
			} catch (\Exception $e) {
			}
		}

        Carbon::setLocale(config('app.locale'));
        $products = $post->getProducts();
        $bestSellerProduct = $products->shift();
        $bestSellerProduct->seller->setAttribute('open_ta', Carbon::createFromDate($bestSellerProduct->seller->open_at)->diffForHumans(Carbon::now()));

        $pricePartial = collect([
            'old_price' => $bestSellerProduct->old_price,
            'discount' => $bestSellerProduct->discount,
            'discount_sum' => $bestSellerProduct->discount_sum,
            'formatted_activity_price' => $bestSellerProduct->formatted_activity_price,
        ]);

        // Get Category nested IDs
        $catNestedIds = (object)[
            'parentId' => $post->category->parent_id,
            'id'       => $post->category->tid,
        ];

        // Get Custom Fields
        $customFields = $this->getPostFieldsValues($catNestedIds, $post->id, $bestSellerProduct->id, $bestSellerProduct->provider);
        view()->share('customFields', $customFields);

        $postPictures = $post->video;
        foreach ($post->pictures as $picture) {
            $postPictures->push($picture);
        }
        // View
        return view('post.details')
            ->with([
                'featured' => $data['featured'],
                'bestSellerProduct' => $bestSellerProduct,
                'pricePartial' => $pricePartial,
                'products' => $products,
                'postPictures' => $postPictures,
                ]
            );
	}

	public function getDefaultOptionSetPrice(Request $request, $productId)
    {
        // Get and Check the Controller's Method Parameters
        $parameters = request()->route()->parameters();
        if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
            abort(404);
        }
        try {
            $bestSellerProduct = Product::find($productId);
            if(!$bestSellerProduct) abort(404);
            // Get Category nested IDs

            $pricePartial = collect([
                'old_price' => $bestSellerProduct->old_price,
                'discount' => $bestSellerProduct->discount,
                'discount_sum' => $bestSellerProduct->discount_sum,
                'formatted_activity_price' => $bestSellerProduct->formatted_activity_price,
            ]);

            $view = view('post.inc.partials._product-price')
                ->with([
                    'pricePartial' => $pricePartial,
                    'user' => Auth::user(),
                    'post' => $bestSellerProduct->post,
                ])
                ->render();

            return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
        } catch ( \Exception $e) {
            return response()->json(['error' => ['message' => t('Entity ID not found.')], 404]);
        }
    }

    public function getFieldOptionSetPrices(ProductPriceRequest $request, $productId)
    {
        try {
            // Get and Check the Controller's Method Parameters
            $parameters = request()->route()->parameters();
            if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
                abort(404);
            }

            $product = Product::find($productId);
            // Get Category nested IDs
            $catNestedIds = (object)[
                'parentId' => $product->post->category->parent_id,
                'id'       => $product->post->category->tid,
            ];

            $customFields =  $this->getPostFieldsValues($catNestedIds, $product->post->id, $productId, $product->provider, $request->get('field_option_set', []));

            $view = view('post.inc.field-values')
                ->with(['customFields' => $customFields, 'bestSellerProduct' => $product, 'productCount' => $request->product_count])
                ->render();

            return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
        } catch ( \Exception $e) {
            return response()->json(['error' => ['message' => t('Entity ID not found.')], 404]);
        }
    }

	public function getFieldOptionSetPrice(ProductPriceRequest $request, $productId)
    {
        try {
            // Get and Check the Controller's Method Parameters
            $parameters = request()->route()->parameters();
            if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
                abort(404);
            }

            $price = $this->getPostFieldOptionPreSetPrices($productId, $request->get('field_option_set'), true);

            $pricePartial = collect([
                'old_price' => $price->first()->old_price,
                'discount' => $price->first()->discount,
                'discount_sum' => $price->first()->discount_sum,
                'formatted_activity_price' => $price->first()->formatted_activity_price,
            ]);

            $view = view('post.inc.partials._product-price')
                ->with([
                    'pricePartial' => $pricePartial,
                    'user' => Auth::user(),
                    'post' => $price->first()->post
                ])
                ->render();

            return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
        } catch ( \Exception $e) {
            return response()->json(['error' => ['message' => t('Entity ID not found.')], 404]);
        }
    }

	/**
	 * Contact the Post's Author
	 *
	 * @param $postId
	 * @param SendMessageRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function sendMessage($postId, SendMessageRequest $request)
	{
		// Get the Post
		$post = Post::unarchived()->findOrFail($postId);
		
		// New Message
		$message = new Message();
		$input   = $request->only($message->getFillable());
		foreach ($input as $key => $value) {
			$message->{$key} = $value;
		}
		
		$message->post_id      = $post->id;
		$message->from_user_id = auth()->check() ? auth()->user()->id : 0;
		$message->to_user_id   = $post->user_id;
		$message->to_name      = $post->contact_name;
		$message->to_email     = $post->email;
		$message->to_phone     = $post->phone;
		$message->subject      = $post->title;
		
		$message->message = $request->input('message')
			. '<br><br>'
			. t('Related to the ad')
			. ': <a href="' . UrlGen::post($post) . '">' . t('Click here to see') . '</a>';
		
		// Save
		$message->save();
		
		// Save and Send user's resume
		if ($request->hasFile('filename')) {
			$message->filename = $request->file('filename');
			$message->save();
		}
		
		// Send a message to publisher
		try {
			if (!isDemo()) {
				$post->notify(new SellerContacted($post, $message));
			}
			
			$msg = t("Your message has sent successfully to :contact_name.", ['contact_name' => $post->contact_name]);
			flash($msg)->success();
		} catch (\Exception $e) {
			flash($e->getMessage())->error();
		}
		
		return redirect(UrlGen::postUri($post));
	}
}
