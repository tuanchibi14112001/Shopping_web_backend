<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepositories;
use App\Repositories\Brand\BrandRepositoryInterFace;

class BrandRepository extends BaseRepositories implements BrandRepositoryInterFace
{
    public function getModel()
    {
        return Brand::class;
    }

}