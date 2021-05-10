<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Search\Traits\PreSearchTrait;
use App\Models\Page;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class DocsController extends AccountBaseController
{
	use PreSearchTrait;

	private $perPage = 12;

	public function __construct()
	{
		parent::__construct();

		$this->perPage = (is_numeric(config('settings.listing.items_per_page'))) ? config('settings.listing.items_per_page') : $this->perPage;
	}

	/**
	 * @param $pagePath
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function getPage($pagePath)
	{
		view()->share('pagePath', $pagePath);

		switch ($pagePath) {
			case 'terms-of-use':
				return $this->getTermsOfUse();
				break;
			case 'privacy-statement':
				return $this->getPrivacyStatement();
				break;
			default:
				abort(404);
		}
	}

    public function getTermsOfUse($slug = 'terms-of-use')
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

        return view('account.terms_of_use');
    }
    public function getPrivacyStatement($slug = 'privacy-statement')
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

        return view('account.privacy-statment');
    }
    public function getIosTerms($slug = 'ios-terms')
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

        return view('account.ios-terms');
    }
}
