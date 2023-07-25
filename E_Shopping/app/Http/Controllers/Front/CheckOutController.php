<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CheckOutController extends Controller
{
    
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = 0;
        return view('front.checkout.index',[
            'carts' => $carts,
            'total' => $total,
            'subtotal' => $subtotal,
        ]);
    }

    public function addOrder(){
        
    }
}
