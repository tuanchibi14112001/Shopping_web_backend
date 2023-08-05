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

    public function getOrderByUserId($userId){
        return $this->model->where('user_id','=' ,$userId)->orderBy('id','desc')->get();
    }

}