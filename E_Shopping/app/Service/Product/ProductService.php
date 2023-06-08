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

}    
?>
