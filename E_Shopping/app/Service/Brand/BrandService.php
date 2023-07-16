<?php

namespace App\Service\Brand;

use App\Repositories\Brand\BrandRepositoryInterFace;
use App\Service\BaseService;

class BrandService extends BaseService implements  BrandServiceInterface

{
    public $repository;

    public function __construct(BrandRepositoryInterFace $brandRepository)
    {
        $this->repository = $brandRepository;
    }

}
