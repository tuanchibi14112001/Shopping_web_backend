<?php
namespace App\Repositories\Product;
use App\Repositories\RepositoriesInterface;

interface ProductRepositoriesInterFace extends RepositoriesInterface
{

    public function getRelatedProducts($product, $limit);
    public function getFeaturedProducts($categoryId);
}


?>