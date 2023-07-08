<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService){
        $this->productService = $productService;
    }

    public function index(){
        $feature_product = $this->productService->getFeaturedProducts();
        return view('front.index', [
            'feature_product' => $feature_product,
        ]);
    }

}
