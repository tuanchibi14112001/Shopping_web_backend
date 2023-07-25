<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = 0;

        return view('front.shop.cart', [
            'carts' => $carts,
            'total' => $total,
            'subtotal' => $subtotal
        ]);
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->productService->find($request->product_id);

            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => ($product->discount && $product->discount > 0) ? $product->discount : $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                    'max_qty' => $product->max_qty,
                ],
            ]);


            if ($response['cart']->qty > $product->max_qty) {
                $response['error_add'] = 'Maximum number of products';
                $response['cart']->qty = $product->max_qty;
                if ($response['cart']->qty <= 0) {
                    $response['cart'] = Cart::remove($response['cart']->rowId);
                    $response['count'] = Cart::count();
                    $response['total'] = Cart::total();
                }
            } else {
                $response['count'] = Cart::count();
                $response['total'] = Cart::total();
            }
            return $response;
        }
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {

            $response['cart'] = Cart::remove($request->rowId);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

        return back();
    }

    public function destroy()
    {
        Cart::destroy();
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {


            $response['cart'] = Cart::get($request->rowId);
            $max_qty = $response['cart']->options->max_qty;

            if ($request->qty <= $max_qty) {
                $response['cart'] = Cart::update($request->rowId, $request->qty);
                $response['count'] = Cart::count();
                $response['total'] = Cart::total();
            } else {
                $response['error'] = 'Maximum number of products';
            }

            return $response;
        }

        return back();
    }
}
