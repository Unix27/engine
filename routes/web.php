<?php

/*
|--------------------------------------------------------------------------
| Back-end
|--------------------------------------------------------------------------
|
| The admin panel routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers\Admin',
	'middleware' => ['web'],
	'prefix'     => config('larapen.admin.route_prefix', 'admin'),
], function ($router) {
	// Auth
	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
	
	// Admin Panel Area
	Route::group([
		'middleware' => ['admin', 'clearance', 'banned.user', 'prevent.back.history'],
	], function ($router) {
		// Dashboard
		Route::get('dashboard', 'DashboardController@dashboard');
		Route::get('/', 'DashboardController@redirect');
		
		// Extra (must be called before CRUD)
		Route::get('homepage/{action}', 'HomeSectionController@reset')->where('action', 'reset_(.*)');
		Route::get('languages/sync_files', 'LanguageController@syncFilesLines');
		Route::get('permissions/create_default_entries', 'PermissionController@createDefaultEntries');
		Route::get('blacklists/add', 'BlacklistController@banUserByEmail');
		
		// CRUD
		CRUD::resource('advertisings', 'AdvertisingController');
		CRUD::resource('blacklists', 'BlacklistController');
		CRUD::resource('categories', 'CategoryController');
		CRUD::resource('categories/{catId}/subcategories', 'SubCategoryController');
		CRUD::resource('categories/{catId}/custom_fields', 'CategoryFieldController');
		CRUD::resource('cities', 'CityController');
		CRUD::resource('countries', 'CountryController');
		CRUD::resource('countries/{countryCode}/cities', 'CityController');
		CRUD::resource('countries/{countryCode}/admins1', 'SubAdmin1Controller');
		CRUD::resource('currencies', 'CurrencyController');
		CRUD::resource('custom_fields', 'FieldController');
		CRUD::resource('custom_fields/{cfId}/options', 'FieldOptionController');
		CRUD::resource('custom_fields/{cfId}/categories', 'CategoryFieldController');
		CRUD::resource('genders', 'GenderController');
		CRUD::resource('homepage', 'HomeSectionController');
		CRUD::resource('admins1/{admin1Code}/cities', 'CityController');
		CRUD::resource('admins1/{admin1Code}/admins2', 'SubAdmin2Controller');
		CRUD::resource('admins2/{admin2Code}/cities', 'CityController');
		CRUD::resource('languages', 'LanguageController');
		CRUD::resource('meta_tags', 'MetaTagController');
		CRUD::resource('pages', 'PageController');
		CRUD::resource('payment_methods', 'PaymentMethodController');
		CRUD::resource('permissions', 'PermissionController');
		CRUD::resource('pictures', 'PictureController');
		CRUD::resource('posts', 'PostController');
		CRUD::resource('products', 'ProductController');
		CRUD::resource('p_types', 'PostTypeController');
		CRUD::resource('report_types', 'ReportTypeController');
		CRUD::resource('roles', 'RoleController');
		CRUD::resource('settings', 'SettingController');
		CRUD::resource('time_zones', 'TimeZoneController');
		CRUD::resource('users', 'UserController');

		// Packages
        CRUD::resource('packages', 'PackageController');
        CRUD::resource('packages/user/{cfId}/list', 'PackageController');
        CRUD::resource('packages/order/{cfId}/list', 'PackageController');
        CRUD::resource('package_items', 'PackageController');
        CRUD::resource('package_items/{cfId}/list', 'PackageItemController');
        CRUD::resource('logistic_timeline/{cfId}/list', 'LogisticController');

        // Orders
        CRUD::resource('orders', 'OrderController');
        CRUD::resource('orders/user/{cfId}/list', 'OrderController');

        // Payments
        CRUD::resource('payments', 'PaymentController');
        CRUD::resource('payments/user/{cfId}/list', 'PaymentController');
        CRUD::resource('payments/package/{cfId}/list', 'PaymentController');

		// Others
		Route::get('account', 'UserController@account');
		Route::post('ajax/{table}/{field}', 'InlineRequestController@make');


		// Backup
		Route::get('backups', 'BackupController@index');
		Route::put('backups/create', 'BackupController@create');
		Route::get('backups/download/{file_name?}', 'BackupController@download');
		Route::delete('backups/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)');
		
		// Actions
		Route::get('actions/clear_cache', 'ActionController@clearCache');
		Route::get('actions/clear_images_thumbnails', 'ActionController@clearImagesThumbnails');
		Route::post('actions/maintenance_down', 'ActionController@maintenanceDown');
		Route::get('actions/maintenance_up', 'ActionController@maintenanceUp');
		
		// Re-send Email or Phone verification message
		Route::get('verify/user/{id}/resend/email', 'UserController@reSendVerificationEmail');
		Route::get('verify/user/{id}/resend/sms', 'UserController@reSendVerificationSms');
		Route::get('verify/post/{id}/resend/email', 'PostController@reSendVerificationEmail');
		Route::get('verify/post/{id}/resend/sms', 'PostController@reSendVerificationSms');
		
		// Plugins
		Route::get('plugins', 'PluginController@index');
		Route::post('plugins/{plugin}/install', 'PluginController@install');
		Route::get('plugins/{plugin}/install', 'PluginController@install');
		Route::get('plugins/{plugin}/uninstall', 'PluginController@uninstall');
		Route::get('plugins/{plugin}/delete', 'PluginController@delete');
	});
});


/*
|--------------------------------------------------------------------------
| Front-end
|--------------------------------------------------------------------------
|
| The not translated front-end routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers',
	'middleware' => ['web'],
], function ($router) {
	// FILES
	Route::get('file', 'FileController@show');
	
	// SEO
	Route::get('sitemaps.xml', 'SitemapsController@index');
	
	// Impersonate (As admin user, login as an another user)
	Route::group(['middleware' => 'auth'], function ($router) {
		Route::impersonate();
	});
});


/*
|--------------------------------------------------------------------------
| Front-end
|--------------------------------------------------------------------------
|
| The translated front-end routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers',
	'middleware' => ['locale'],
	'prefix'     => LaravelLocalization::setLocale(),
], function ($router) {
	Route::group(['middleware' => ['web']], function ($router) {
		// HOMEPAGE
		Route::get('/', 'HomeController@index')->name('index');
        Route::get('/privacy', 'HomeController@privacy');
        Route::get('/terms', 'HomeController@terms');
        Route::get('/category', 'HomeController@catalog')->name('catalog');
        Route::get('/about', 'HomeController@about');

//		Route::get(LaravelLocalization::transRoute('routes.countries'), 'CountriesController@index');
		
		
		// AUTH
		Route::group(['middleware' => ['guest', 'prevent.back.history']], function ($router) {
			// Registration Routes...
			Route::get(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@showRegistrationForm');
			Route::post(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@register');
			Route::get('register/finish', 'Auth\RegisterController@finish');
			
			// Authentication Routes...
			Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm');
			Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login');
			
			// Forgot Password Routes...
			Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
			Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
			
			// Reset Password using Token
			Route::get('password/token', 'Auth\ForgotPasswordController@showTokenRequestForm');
			Route::post('password/token', 'Auth\ForgotPasswordController@sendResetToken');
			
			// Reset Password using Link (Core Routes...)
			Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
			Route::post('password/reset', 'Auth\ResetPasswordController@reset');
			
			// Social Authentication
			$router->pattern('provider', 'facebook|linkedin|twitter|google');
			Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
			Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
		});
		
		// Email Address or Phone Number verification
		$router->pattern('field', 'email|phone');
		Route::get('verify/user/{id}/resend/email', 'Auth\RegisterController@reSendVerificationEmail');
		Route::get('verify/user/{id}/resend/sms', 'Auth\RegisterController@reSendVerificationSms');
		Route::get('verify/user/{field}/{token?}', 'Auth\RegisterController@verification');
		Route::post('verify/user/{field}/{token?}', 'Auth\RegisterController@verification');
		
		// User Logout
		Route::get(LaravelLocalization::transRoute('routes.logout'), 'Auth\LoginController@logout');
		
		
		// POSTS
		Route::group(['namespace' => 'Post'], function ($router) {
			$router->pattern('id', '[0-9]+');
			// $router->pattern('slug', '.*');
			$router->pattern('slug', '^(?=.*)((?!\/).)*$');

			//Background
            Route::post('products/{id}/field_option_set_price', 'DetailsController@getFieldOptionSetPrice');
            Route::post('products/{id}/field_option_set_prices', 'DetailsController@getFieldOptionSetPrices');
            Route::post('products/{id}/getDefaultOptionSetPrice', 'DetailsController@getDefaultOptionSetPrice');

			// SingleStep Post creation
//			Route::group(['namespace' => 'CreateOrEdit\SingleStep'], function ($router) {
//				Route::get('create', 'CreateController@getForm');
//				Route::post('create', 'CreateController@postForm');
//				Route::get('create/finish', 'CreateController@finish');
//
//				// Payment Gateway Success & Cancel
//				Route::get('create/payment/success', 'CreateController@paymentConfirmation');
//				Route::get('create/payment/cancel', 'CreateController@paymentCancel');
//
//				// Email Address or Phone Number verification
//				$router->pattern('field', 'email|phone');
//				Route::get('verify/post/{id}/resend/email', 'CreateController@reSendVerificationEmail');
//				Route::get('verify/post/{id}/resend/sms', 'CreateController@reSendVerificationSms');
//				Route::get('verify/post/{field}/{token?}', 'CreateController@verification');
//				Route::post('verify/post/{field}/{token?}', 'CreateController@verification');
//			});
			
			// MultiSteps Post creation
//			Route::group(['namespace' => 'CreateOrEdit\MultiSteps'], function ($router) {
//				Route::get('posts/create/{tmpToken?}', 'CreateController@getForm');
//				Route::post('posts/create', 'CreateController@postForm');
//				Route::put('posts/create/{tmpToken}', 'CreateController@postForm');
//				Route::get('posts/create/{tmpToken}/photos', 'PhotoController@getForm');
//				Route::post('posts/create/{tmpToken}/photos', 'PhotoController@postForm');
//				Route::post('posts/create/{tmpToken}/photos/{id}/delete', 'PhotoController@delete');
//				Route::get('posts/create/{tmpToken}/payment', 'PaymentController@getForm');
//				Route::post('posts/create/{tmpToken}/payment', 'PaymentController@postForm');
//				Route::get('posts/create/{tmpToken}/finish', 'CreateController@finish');
//
//				// Payment Gateway Success & Cancel
//				Route::get('posts/create/{tmpToken}/payment/success', 'PaymentController@paymentConfirmation');
//				Route::get('posts/create/{tmpToken}/payment/cancel', 'PaymentController@paymentCancel');
//
//				// Email Address or Phone Number verification
//				$router->pattern('field', 'email|phone');
//				Route::get('verify/post/{id}/resend/email', 'CreateController@reSendVerificationEmail');
//				Route::get('verify/post/{id}/resend/sms', 'CreateController@reSendVerificationSms');
//				Route::get('verify/post/{field}/{token?}', 'CreateController@verification');
//				Route::post('verify/post/{field}/{token?}', 'CreateController@verification');
//			});
			
//			Route::group(['middleware' => 'auth'], function ($router) {
//				$router->pattern('id', '[0-9]+');
//
//				// SingleStep Post edition
//				Route::group(['namespace' => 'CreateOrEdit\SingleStep'], function ($router) {
//					Route::get('edit/{id}', 'EditController@getForm');
//					Route::put('edit/{id}', 'EditController@postForm');
//
//					// Payment Gateway Success & Cancel
//					Route::get('edit/{id}/payment/success', 'EditController@paymentConfirmation');
//					Route::get('edit/{id}/payment/cancel', 'EditController@paymentCancel');
//				});
//
//				// MultiSteps Post edition
//				Route::group(['namespace' => 'CreateOrEdit\MultiSteps'], function ($router) {
//					Route::get('posts/{id}/edit', 'EditController@getForm');
//					Route::put('posts/{id}/edit', 'EditController@postForm');
//					Route::get('posts/{id}/photos', 'PhotoController@getForm');
//					Route::post('posts/{id}/photos', 'PhotoController@postForm');
//					Route::post('posts/{token}/photos/{id}/delete', 'PhotoController@delete');
//					Route::get('posts/{id}/payment', 'PaymentController@getForm');
//					Route::post('posts/{id}/payment', 'PaymentController@postForm');
//
//					// Payment Gateway Success & Cancel
//					Route::get('posts/{id}/payment/success', 'PaymentController@paymentConfirmation');
//					Route::get('posts/{id}/payment/cancel', 'PaymentController@paymentCancel');
//				});
//			});
			
			// Post's Details
			Route::get(LaravelLocalization::transRoute('routes.post'), 'DetailsController@index');
			
			// Contact Post's Author
			Route::post('posts/{id}/contact', 'DetailsController@sendMessage');
			
			// Send report abuse
			Route::get('posts/{id}/report', 'ReportController@showReportForm');
			Route::post('posts/{id}/report', 'ReportController@sendReport');
		});

        Route::group(['namespace' => 'Cart'], function ($router) {
            Route::get('cart', 'CartController@show')->name('show_cart');
            Route::post('cart/add', 'CartController@add');
            Route::post('cart/remove', 'CartController@delete')->name('remove_from_cart');
            Route::post('cart/update', 'CartController@update')->name('update_cart');
            Route::get('cart/remove-all', 'CartController@clear')->name('remove_all');
            Route::get('cart/total-price', 'CartController@getTotalPrice')->name('get_cart_total');
            Route::get('cart/count', 'CartController@getCartCount');
            Route::get('cart/fillFromLanding', 'CartController@fillFromLanding');
        });
            //CHECKOUT
        Route::group(['namespace' => 'Checkout'], function ($router) {
            Route::get('checkout', 'CheckoutController@show');
            Route::post('checkout/login', 'CheckoutController@login');
            Route::post('checkout/register', 'CheckoutController@register');
            Route::post('checkout/save', 'CheckoutController@save');
            Route::get('checkout/done', 'CheckoutController@thankYouPage');
            Route::get('checkout/sepa/{checkoutId}', 'CheckoutController@showSepaForm')->name('show_sepa_form');
            Route::any('checkout/subscription_cancelled', 'CheckoutController@subscriptionCancelled');
            Route::any('checkout/subscription_activated', 'CheckoutController@subscriptionActivated');
        });


		// ACCOUNT
		Route::group(['middleware' => ['auth', 'banned.user', 'prevent.back.history'], 'namespace' => 'Account'], function ($router) {
			$router->pattern('id', '[0-9]+');
			
			// Users
			Route::get('account', 'EditController@index');
			Route::group(['middleware' => 'impersonate.protect'], function () {
				Route::put('account', 'EditController@updateDetails');
				Route::put('account/settings', 'EditController@updateSettings');
				Route::put('account/preferences', 'EditController@updatePreferences');
				Route::post('account/{id}/photo', 'EditController@updatePhoto');
				Route::post('account/{id}/photo/delete', 'EditController@deletePhoto');
			});
			Route::get('account/close', 'CloseController@index');
			Route::group(['middleware' => 'impersonate.protect'], function () {
				Route::post('account/close', 'CloseController@submit');
			});

            Route::get('account/terms-of-use', 'DocsController@getTermsOfUse');
            Route::get('account/privacy-statement', 'DocsController@getPrivacyStatement');
            Route::get('account/ios-terms', 'DocsController@getIosTerms');

			// Posts
			Route::get('account/saved-search', 'PostsController@getSavedSearch');
			$router->pattern('pagePath', '(my-posts|archived|favourite|pending-approval|saved-search)+');
			Route::get('account/{pagePath}', 'PostsController@getPage');
			Route::get('account/my-posts/{id}/offline', 'PostsController@getMyPosts');
			Route::get('account/archived/{id}/repost', 'PostsController@getArchivedPosts');
			Route::get('account/{pagePath}/{id}/delete', 'PostsController@destroy');
			Route::post('account/{pagePath}/delete', 'PostsController@destroy');
			
			// Conversations
			Route::get('account/conversations', 'ConversationsController@index');
			Route::get('account/conversations/{id}/delete', 'ConversationsController@destroy');
			Route::post('account/conversations/delete', 'ConversationsController@destroy');
			Route::post('account/conversations/{id}/reply', 'ConversationsController@reply');
			$router->pattern('msgId', '[0-9]+');
			Route::get('account/conversations/{id}/messages', 'ConversationsController@messages');
			Route::get('account/conversations/{id}/messages/{msgId}/delete', 'ConversationsController@destroyMessages');
			Route::post('account/conversations/{id}/messages/delete', 'ConversationsController@destroyMessages');
			
			// Transactions
			Route::get('account/transactions', 'TransactionsController@index');

			//Orders
            Route::get('account/orders', 'OrdersController@index');
            Route::post('account/orders/filter', 'OrdersController@filter');
            Route::get('account/orders/{id}', 'OrdersController@show');
		});
		
		
		// AJAX
		Route::group(['prefix' => 'ajax'], function ($router) {
			Route::get('countries/{countryCode}/admins/{adminType}', 'Ajax\LocationController@getAdmins');
			Route::get('countries/{countryCode}/admins/{adminType}/{adminCode}/cities', 'Ajax\LocationController@getCities');
			Route::get('countries/{countryCode}/cities/{id}', 'Ajax\LocationController@getSelectedCity');
			Route::post('countries/{countryCode}/cities/autocomplete', 'Ajax\LocationController@searchedCities');
			Route::post('countries/{countryCode}/admin1/cities', 'Ajax\LocationController@getAdmin1WithCities');
			Route::post('category/sub-categories', 'Ajax\CategoryController@getSubCategories');
			Route::post('category/custom-fields', 'Ajax\CategoryController@getCustomFields');
			Route::post('save/post', 'Ajax\PostController@savePost');
			Route::post('save/search', 'Ajax\PostController@saveSearch');
			Route::post('post/phone', 'Ajax\PostController@getPhone');
			Route::post('post/pictures/reorder', 'Ajax\PostController@picturesReorder');
			Route::post('messages/check', 'Ajax\ConversationController@checkNewMessages');
            Route::get('/show_all_categories', 'Ajax\CategoryController@showAllCategories');
		});
		
		
		// FEEDS
		Route::feeds();
		
		
		// Country Code Pattern
		$countryCodePattern = implode('|', array_map('strtolower', array_keys(getCountries())));
		$router->pattern('countryCode', $countryCodePattern);
		
		
		// XML SITEMAPS
		Route::get('{countryCode}/sitemaps.xml', 'SitemapsController@site');
		Route::get('{countryCode}/sitemaps/pages.xml', 'SitemapsController@pages');
		Route::get('{countryCode}/sitemaps/categories.xml', 'SitemapsController@categories');
		Route::get('{countryCode}/sitemaps/cities.xml', 'SitemapsController@cities');
		Route::get('{countryCode}/sitemaps/posts.xml', 'SitemapsController@posts');
		
		
		// STATICS PAGES
		Route::get(LaravelLocalization::transRoute('routes.page'), 'PageController@index');
		Route::get(LaravelLocalization::transRoute('routes.contact'), 'PageController@contact');
		Route::post(LaravelLocalization::transRoute('routes.contact'), 'PageController@contactPost');
		Route::get(LaravelLocalization::transRoute('routes.sitemap'), 'SitemapController@index');

        Route::get('subscribe-galaxy', 'PageController@invite_galaxy');
        Route::get('subscribe-iphone', 'PageController@invite_iphone');
        Route::get('subscribe-iphone-pro', 'PageController@invite_iphone_pro');
        Route::get('subscribe-iphone-fra', 'PageController@invite_iphone_fra');
        Route::get('subscribe-amazon', 'PageController@invite_amazon');
        Route::get('subscribe-paypal', 'PageController@invite_paypal');
        Route::get('subscribe-amaz1uk', 'PageController@invite_amaz1uk');
        Route::get('subscribe-paypaluk', 'PageController@invite_paypaluk');
        Route::get('subscribe-paypal-en', 'PageController@invite_paypal_en');


		// DYNAMIC URL PAGES
		$router->pattern('id', '[0-9]+');
		$router->pattern('username', '[a-zA-Z0-9]+');
		Route::get(LaravelLocalization::transRoute('routes.search'), 'Search\SearchController@index')->name('search');
		Route::get(LaravelLocalization::transRoute('routes.search-user'), 'Search\UserController@index');
		Route::get(LaravelLocalization::transRoute('routes.search-username'), 'Search\UserController@profile');
		Route::get(LaravelLocalization::transRoute('routes.search-tag'), 'Search\TagController@index');
		Route::get(LaravelLocalization::transRoute('routes.search-city'), 'Search\CityController@index');
		Route::get(LaravelLocalization::transRoute('routes.search-subCat'), 'Search\CategoryController@index');
		Route::get(LaravelLocalization::transRoute('routes.search-cat'), 'Search\CategoryController@index')->name('search-cat');
	});

    Route::get('/debug-sentry', function () {
        throw new Exception('My first Sentry error!');
    });
});
