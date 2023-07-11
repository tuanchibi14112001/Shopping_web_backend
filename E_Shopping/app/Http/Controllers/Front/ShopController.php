<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;

    public function __construct(ProductServiceInterface $productService, ProductCommentServiceInterface $productCommentService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
    }

    public function index(){
        $products = $this->productService->getProductOnIndex();
        return view('front.shop.index', [
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $product = $this->productService->find($id);
        $related_products = $this->productService->getRelatedProducts($product, 4);
        return view('front.shop.show', [
            'product' => $product,
            'related_products' => $related_products,
        ]);
    }

    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }
}
