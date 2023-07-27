<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

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

        if ($request->payment_type == 'pay_later') {

            $total = Cart::total();
            $subtotal = 0;
            $this->sendEmail($order, $total, $subtotal);

            // Xoa gio hang
            Cart::destroy();
            // Tra ve ket qua
            return redirect('checkout/result')->with('notification', 'Success! Please check your email.');
        }

        if ($request->payment_type == 'online_payment') {

            // Lay URL thanh toan VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, // ID don hang
                'vnp_OrderInfo' => 'order', // thong tin mo ta
                'vnp_Amount' => Cart::total(0, '', '') * 23070 // Tong ia tri don hang VND
            ]);

            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request)
    {
        // VNPay tra ve qua $vnp_ReturnUrl

        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // ma phan hoi
        $vnp_TxnRef  = $request->get('vnp_TxnRef'); // order id
        $vnp_Amount  = $request->get('vnp_Amount');


        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {

                $order = $this->orderService->find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = 0;
                $this->sendEmail($order, $total, $subtotal);

                Cart::destroy();
                // Tra ve ket qua
                return redirect('checkout/result')->with('notification', 'Success! Has paid online.Please check your email.');
            } else {
                // xoa order trong csdl
                $this->orderService->delete($vnp_TxnRef);
                return redirect('checkout/result')->with('notification', 'Error: Payment failed.');
            }
        }
    }

    public function result()
    {
        $notifi = session('notification');
        return view('front.checkout.result', [
            'notifi' => $notifi,
        ]);
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;
        
        Mail::send('front.checkout.email', [
            'order' => $order,
            'total' => $total,
            'subtotal' => $subtotal
        ], function ($message) use ($email_to) {
            $message->from('testeshop1411@gmail.com', 'testEshop');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
}
