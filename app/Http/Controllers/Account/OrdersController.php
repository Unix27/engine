<?php

namespace App\Http\Controllers\Account;

use Auth;
use Illuminate\Http\Request;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Account
 */
class OrdersController extends AccountBaseController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $pagePath = 'orders';

        // SEO
        $title = trans('global.My orders');
        $description = trans('global.My orders');

        // Meta Tags
        MetaTag::set('title', $title);
        MetaTag::set('description', $description);

        $user = Auth::user();

        $packages = $user->packages;

        return view('account.orders', compact('pagePath', 'packages'));
    }

    public function filter(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if (!$user) return false;
        $packages = $user->packages;
        if ($request->has('status')) {
            $packages = $packages->where('status', $request->get('status'));
        }

        $view = view('account.order.list', compact('packages'))->render();
        return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $pagePath = 'orders';
        $user = Auth::user();

        // SEO
        $title = trans('global.Order #').$id.' - '.trans('global.My orders');
        $description = trans('global.Order #').$id.' - '.trans('global.My orders');

        // Meta Tags
        MetaTag::set('title', $title);
        MetaTag::set('description', $description);

        $package = $user->orders->find($id)->package;
        $posts = $package->items->first()->post->getSimilarByCategory();
        return view('account.order.show', compact('pagePath', 'package', 'posts'));
    }
}