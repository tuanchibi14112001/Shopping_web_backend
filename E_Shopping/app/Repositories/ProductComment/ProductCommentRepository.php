<?php

namespace App\Repositories\ProductComment;

use App\Models\ProductComment;
use App\Repositories\BaseRepositories;
use App\Repositories\ProductComment\ProductCommentRepositoryInterFace;

class ProductCommentRepository extends BaseRepositories implements ProductCommentRepositoryInterface
{
    public function getModel(){
        return ProductComment::class;
    }
}



