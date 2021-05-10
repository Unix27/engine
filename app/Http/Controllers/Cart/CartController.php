<?php

namespace App\Http\Controllers\Cart;

use App;
use DB;
use App\Http\Controllers\FrontController;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Services\Cart\CartService;
use App\Models\Product;

/**
 * Class CartController
 * @package App\Http\Controllers\Cart
 */
class CartController extends FrontController
{
    use App\Http\Controllers\Post\Traits\CustomFieldTrait;
    /**
     * @var CartService
     */
    private $cartService;
    /**
     * @var
     */
    protected $loginPath;
    /**
     * @var string
     */
    protected $redirectTo = '/checkout';

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        parent::__construct();
    }


    /**
     * @return mixed
     */
    public function show()
    {
        view()->share('uriPathPageSlug', 'cart');

        // Meta Tags
        MetaTag::set('title', config('app.name') . ' - Cart');
        MetaTag::set('description', config('app.name') . ' - Cart');

        $cart = $this->cartService->getCart();
        if ($cart) {
            foreach ($cart as &$item) {
                $pid = 0;
                if (isset($item->options[0])) {
                    $pid = (int)$item->options[0]['options']['product_id'];
                }
                $item->product = Product::find($pid);
                $item->post = $item->product->post;
            }
        }
        $total = $this->cartService->getCartTotal();
        $similar_products = collect();
        $posts_length = 6;

        return view('order.cart', compact('cart', 'total', 'similar_products', 'posts_length'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function add(\Illuminate\Http\Request $request)
    {
        $dtoCart = new App\Services\Dto\DtoCart();
        $dtoCart->__setAll($request->all());

        //currency
        $dtoCart->__set('currency_code', currency()->getUserCurrency());
        $product = Product::find($request->get('product_id'));

        $cart_add = false;

        if ($product) {
            $price = $this->getPostFieldOptionPreSetPrices($request->get('product_id'), array_first($request->get('attrs'))['options']['fields_set'], true);
            $dtoCart->__set('product', $product);
            $dtoCart->__set('product_title', $product->title);
            $dtoCart->__set('price', ($price && $price->count()) ? $price->first()->sku_activity_amount : $product->max_activity_amount);

            //try update cart
            $rowId = $this->cartService->getRowId($dtoCart);
            if ($rowId) {
                $dtoCart->__set('row_id', $rowId);
                $cart_add = $this->cartService->updateCart($dtoCart, 'plus');
            } else {
                $cart_add = $this->cartService->addToCart($dtoCart);
            }
        }

        $cart = $this->cartService->getCart();
        return response()->json([
            'cart_add' => $cart_add,
            'cart' => $cart
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(\Illuminate\Http\Request $request)
    {
        $dtoCart = new App\Services\Dto\DtoCart();
        $dtoCart->__setAll($request->all());

        $cart_remove = false;

        $rowId = $this->cartService->getRowId($dtoCart);
        if ($rowId) {
            $dtoCart->__set('row_id', $rowId);
            $cart_remove = $this->cartService->updateCart($dtoCart, 'remove');
        }

        $cart = $this->cartService->getCart();

        return response()->json([
            'state' => 'ok',
            'cart_remove' => $cart_remove,
            'cart' => $cart
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(\Illuminate\Http\Request $request)
    {
        $action = $request->action;

        $dtoCart = new App\Services\Dto\DtoCart();
        $dtoCart->__setAll($request->all());

        $cart_update = false;
        $rowId = $this->cartService->getRowId($dtoCart);
        if ($rowId) {
            $dtoCart->__set('row_id', $rowId);
            if ($action == 'minus') {
                $cart_update = $this->cartService->updateCart($dtoCart, 'minus');
            } elseif ($action == 'plus') {
                $cart_update = $this->cartService->updateCart($dtoCart, 'plus');
            }
        }

        $cart = $this->cartService->getCart();

        return response()->json([
            'state' => 'ok',
            'cart_update' => $cart_update,
            'cart' => $cart
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        $this->cartService->removeAll();
        return redirect()->back();
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->cartService->getCartTotal();
    }

    /**
     * @return mixed
     */
    public function getCartCount()
    {
        return $this->cartService->getCartCount();
    }

    public function fillFromLanding(\Illuminate\Http\Request $request) {
        if($this->add($request)) {
            return redirect('cart');
        }
    }
}