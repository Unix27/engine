<?php

namespace App\Http\Controllers\Search;

use App\Models\Category;
use App\Models\CategoryField;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class CategoryController extends BaseController
{
	public $isCatSearch = true;
	
	protected $cat    = null;
	protected $subCat = null;
	
	/**
	 * @param $countryCode
	 * @param $catSlug
	 * @param null $subCatSlug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function index($countryCode, $catSlug, $subCatSlug = null)
	{
		// Check multi-countries site parameters
		if (!config('settings.seo.multi_countries_urls')) {
			$subCatSlug = $catSlug;
			$catSlug    = $countryCode;
		}
		
		view()->share('isCatSearch', $this->isCatSearch);
		
		// Get Category
		$this->cat = Category::trans()->where('parent_id', 0)->where('slug', '=', $catSlug)->firstOrFail();
		view()->share('cat', $this->cat);
		
		// Get common Data
		$catName        = $this->cat->name;
		$catDescription = $this->cat->description;
		
		// Get Category nested IDs
		$catNestedIds = (object)[
			'parentId' => $this->cat->parent_id,
			'id'       => $this->cat->tid,
		];
		
		// Check if this is SubCategory Request
		if (!empty($subCatSlug)) {
			$this->isSubCatSearch = true;
			view()->share('isSubCatSearch', $this->isSubCatSearch);
			
			// Get SubCategory
			$this->subCat = Category::trans()->where('parent_id', $this->cat->tid)->where('slug', '=', $subCatSlug)->firstOrFail();
			view()->share('subCat', $this->subCat);
			
			// Get common Data
			$catName        = $this->subCat->name;
			$catDescription = $this->subCat->description;
			
			// Get Category nested IDs
			$catNestedIds = (object)[
				'parentId' => $this->subCat->parent_id,
				'id'       => $this->subCat->tid,
			];
		}
		
		// Get Custom Fields
		$customFields = CategoryField::getFields($catNestedIds);
		view()->share('customFields', $customFields);
		
		// Search
		$search = new $this->searchClass();
		if (isset($this->subCat) && !empty($this->subCat)) {
			$data = $search->setCategory($this->cat->tid, $this->subCat->tid)->fetch();
		} else {
			$data = $search->setCategory($this->cat->tid)->fetch();
		}
		
		// Get Titles
		$bcTab     = $this->getBreadcrumb();
		$htmlTitle = $this->getHtmlTitle();
		view()->share('bcTab', $bcTab);
		view()->share('htmlTitle', $htmlTitle);
		
		// SEO
		$title = $this->getTitle();
		if (isset($catDescription) && !empty($catDescription)) {
			$description = Str::limit($catDescription, 200);
		} else {
			$description = Str::limit(t('Free ads :category in :location', [
					'category' => $catName,
					'location' => config('country.name'),
				]) . '. ' . t('Looking for a product or service') . ' - ' . config('country.name'), 200);
		}
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		// Open Graph
		$this->og->title($title)->description($description)->type('website');
		if ($data['count']->get('all') > 0) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
		}
		view()->share('og', $this->og);
		
		// Translation vars
		view()->share('uriPathCatSlug', $catSlug);
		if (!empty($subCatSlug)) {
			view()->share('uriPathSubCatSlug', $subCatSlug);
		}
        if(request()->ajax() && request()->get('show_more')) {
            $view = view('search.inc.postsItems', $data)->render();
            return response()->json(['html' => $view]);
        } else {
            return view('search.serp', $data);
        }
	}
}
