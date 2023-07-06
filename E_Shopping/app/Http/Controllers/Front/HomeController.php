<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $feature_product = [];
        return view('front.index', [
            'feature_product' => $feature_product,
        ]);
    }

}
