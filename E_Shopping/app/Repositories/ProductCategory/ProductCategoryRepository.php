<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterFace;

class ProductCategoryRepository extends BaseRepositories implements ProductCategoryRepositoryInterFace
{
    public function getModel()
    {
        return ProductCategory::class;
    }

}