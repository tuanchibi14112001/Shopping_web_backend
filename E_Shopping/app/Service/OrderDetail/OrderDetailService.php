<?php

namespace App\Service\OrderDetail;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterFace;
use App\Service\BaseService;

class OrderDetailService extends BaseService implements  OrderDetailServiceInterface

{
    public $repository;

    public function __construct(OrderDetailRepositoryInterFace $orderDetailRepository)
    {
        $this->repository = $orderDetailRepository;
    }

}
