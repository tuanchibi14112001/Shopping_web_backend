<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductCommentServiceInterface $productCommentService,
        ProductCategoryServiceInterface $productCategoryService,
        BrandServiceInterface $brandService
    ) {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands    = $this->brandService->all();
        $products = $this->productService->getProductOnIndex($request);
        return view('front.shop.index', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
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

    public function category($category_name, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands    = $this->brandService->all();
        $products = $this->productService->getProductByCategory($category_name,$request);
        return view('front.shop.index', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
        ]);
    }
}
