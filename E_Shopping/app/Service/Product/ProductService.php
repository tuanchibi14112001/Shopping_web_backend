<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoriesInterFace;
use App\Service\BaseService;

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
        return $product;
    }
}
