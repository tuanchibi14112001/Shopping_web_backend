<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositories;

class ProductRepositories extends BaseRepositories implements ProductRepositoriesInterFace
{
    public function getModel(){
        return Product::class;
    }

    public function getRelatedProducts( $product, $limit = 4){
        return $this->model->where('product_category_id', $product->product_category_id)
                    ->where('id', '!=', $product->id)
                    ->where('tag', $product->tag)
                    ->limit($limit)->get();
    }

    public function getFeaturedProducts($categoryId){
        return $this->model->where('product_category_id', $categoryId)
                    ->orderBy('price', 'desc')->get();
    }

}
?>
