<?php
namespace App\Service\Product;

use App\Service\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface

{
    public function getRelatedProducts($product, $limit);
    public function getFeaturedProducts();   
}




?>