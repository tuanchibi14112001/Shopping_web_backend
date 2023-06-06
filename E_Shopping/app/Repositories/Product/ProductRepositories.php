<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositories;

class ProductRepositories extends BaseRepositories implements ProductRepositoriesInterFace
{
    public function getModel(){
        return Product::class;
    }
}


?>
