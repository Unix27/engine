<?php

namespace Larapen\Feed\Http;

use App\Http\Controllers\FrontController;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Larapen\Feed\Feed;


class FeedController extends FrontController
{
	public function __construct()
	{
		parent::__construct();
		
		$title = t('All ads') . ' ' . t('on') . ' ' . config('app.name');
		Config::set('feed.feeds.main.title', $title);
	}
	
	public function __invoke()
	{
		$feeds = config('feed.feeds');
		
		$name = Str::after(app('router')->currentRouteName(), 'feeds.');
		
		$feed = $feeds[$name] ?? null;

        $items = $this->resolveFeedItems($feed['items']);

		abort_unless($feed, 404);

        $headers = [
            'Content-Type' => 'application/xml;charset=UTF-8',
        ];

		if ($feed['headers']) {
            $headers = $feed['headers'];
        }
		return new Feed($feed['title'], $items, request()->url(),$feed['view'] ?? 'feed::feed', '', $headers);
	}

    protected function resolveFeedItems($resolver): Collection
    {
        $resolver = Arr::wrap($resolver);

        $items = app()->call(
            array_shift($resolver), $resolver
        );

        return $items;
    }
}
