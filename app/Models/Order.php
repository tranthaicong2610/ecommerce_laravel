<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    public function details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
