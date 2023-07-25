<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoriesInterFace;
use App\Service\BaseService;
use Illuminate\Http\Request;

class ProductService extends BaseService implements ProductServiceInterface

{
    public $repository;

    public function __construct(ProductRepositoriesInterFace $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find($id)
    {
        $product = $this->repository->find($id);

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRating = count($product->productComments);

        if ($countRating != 0) 
        {
            $avgRating = round($sumRating/$countRating,1);
        }
        $product->avgRating = $avgRating;

        $max_qty = array_sum(array_column($product->productDetails->toArray(), 'qty'));
        $product->max_qty = $max_qty;
        return $product;
    }

    public function getRelatedProducts($product, $limit){
        return $this->repository->getRelatedProducts($product, $limit);
    }

    public function getFeaturedProducts(){
        return [
            'men'=> $this->repository->getFeaturedProducts(1),
            'women'=> $this->repository->getFeaturedProducts(2), 

        ];
    }

    public function getProductOnIndex($request){
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductByCategory($category_name, $request){
        return $this->repository->getProductByCategory($category_name,$request);
    }
}
