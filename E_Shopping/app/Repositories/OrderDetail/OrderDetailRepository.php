<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepositories;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterFace;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterFace
{
    public function getModel()
    {
        return OrderDetail::class;
    }

}