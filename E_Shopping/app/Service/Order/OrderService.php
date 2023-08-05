<?php

namespace App\Service\Order;

use App\Repositories\Order\OrderRepositoryInterFace;
use App\Service\BaseService;

class OrderService extends BaseService implements  OrderServiceInterface

{
    public $repository;

    public function __construct(OrderRepositoryInterFace $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    public function getOrderByUserId($userId){
        return $this->repository->getOrderByUserId($userId);
    }

}
