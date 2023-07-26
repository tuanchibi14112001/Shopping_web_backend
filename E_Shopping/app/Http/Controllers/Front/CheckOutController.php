<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Illuminate\Http\Request;
use Cart;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(
        OrderServiceInterface $orderService,
        OrderDetailServiceInterface $orderDetailService
    ) {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = 0;
        return view('front.checkout.index', [
            'carts' => $carts,
            'total' => $total,
            'subtotal' => $subtotal,
        ]);
    }

    public function addOrder(Request $request)
    {

        //Them don hang
        $order = $this->orderService->create($request->all());

        // Them chi tiet don hang
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        // Xoa gio hang
        Cart::destroy();

        // Tra ve ket qua
        return redirect('checkout/result')->with('notification', 'Success! Please check your email.');
    }

    public function result(){
        $notifi = session('notification');
        return view('front.checkout.result', [
            'notifi' => $notifi,
        ]);
    }
}
