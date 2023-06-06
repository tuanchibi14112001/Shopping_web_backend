<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKeu = 'id';
    protected $guarded = [];

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
