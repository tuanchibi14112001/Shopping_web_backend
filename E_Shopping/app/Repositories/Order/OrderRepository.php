<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepositories;
use App\Repositories\Order\OrderRepositoryInterFace;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterFace
{
    public function getModel()
    {
        return Order::class;
    }

}