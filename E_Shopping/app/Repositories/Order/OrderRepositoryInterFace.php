<?php
namespace App\Repositories\Order;
use App\Repositories\RepositoriesInterface;

interface OrderRepositoryInterFace extends RepositoriesInterface
{
    public function getOrderByUserId($userId);
}


?>