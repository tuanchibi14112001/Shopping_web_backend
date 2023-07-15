<?php

namespace App\Service\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepositoryInterFace;
use App\Service\BaseService;

class ProductCategoryService extends BaseService implements  ProductCategoryServiceInterface

{
    public $repository;

    public function __construct(ProductCategoryRepositoryInterFace $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }

}
