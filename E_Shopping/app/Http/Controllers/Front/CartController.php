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

            $reponse['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => ($product->discount && $product->discount > 0) ? $product->discount : $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $reponse['count'] = Cart::count();
            $reponse['total'] = Cart::total();

            return $reponse;
        }
        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){

            $response['cart'] = Cart::remove($request->rowId);
            $reponse['count'] = Cart::count();
            $reponse['total'] = Cart::total();

            return $reponse;
        }

        return back();
    }
}
