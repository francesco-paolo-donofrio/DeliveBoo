<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders() //$product->orders->quantity
    {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withPivot('quantity', 'unit_price', 'product_name');
    }
}
