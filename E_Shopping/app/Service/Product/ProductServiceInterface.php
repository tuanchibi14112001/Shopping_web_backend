<?php
namespace App\Service\Product;

use App\Service\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface

{
    public function getRelatedProducts($product, $limit);
    public function getFeaturedProducts(); 
    public function getProductOnIndex($request);
    public function getProductByCategory($category_name, $request);  
}




?>