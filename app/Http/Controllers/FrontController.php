<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CommonTrait;
use App\Http\Controllers\Traits\LocalizationTrait;
use App\Http\Controllers\Traits\RobotsTxtTrait;
use App\Http\Controllers\Traits\SettingsTrait;
use Jenssegers\Agent\Agent;

class FrontController extends Controller
{
	use LocalizationTrait, SettingsTrait, RobotsTxtTrait, CommonTrait;
	
	public $request;
	public $data = [];
	
	/**
	 * FrontController constructor.
	 */
	public function __construct()
	{
		// Set the storage disk
		$this->setStorageDisk();
		
		// Check & Change the App Key (If needed)
		$this->checkAndGenerateAppKey();
		
		// Load the Plugins
		$this->loadPlugins();
		
		// From Laravel 5.3.4+
		$this->middleware(function ($request, $next)
		{
			$this->loadLocalizationData();
			$this->checkDotEnvEntries();
			$this->applyFrontSettings();
			$this->checkRobotsTxtFile();
			
			return $next($request);
		});
		
        view()->share('agent', new Agent());
		// Check the 'Currency Exchange' plugin
//		if (config('plugins.currencyexchange.installed')) {
//			$this->middleware(['currencies', 'currencyExchange']);
//		}
		
		// Check the 'Domain Mapping' plugin
//		if (config('plugins.domainmapping.installed')) {
//			$this->middleware(['domain.verification']);
//		}

//		app(HomeController::class)->getCategories();
//        $mainCategories = \App\Models\Category::trans()->where('parent_id', 0)->get();
//        view()->share('mainCategories', $mainCategories);
	}

}
