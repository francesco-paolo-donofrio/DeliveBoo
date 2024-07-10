<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Lead;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() //$product->orders->quantity
    {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class)->withPivot('quantity', 'unit_price', 'product_name');
    }

    public function lead() //relazione con tabella lead dei messaggi
    {
        return $this->hasOne(Lead::class);
    }

}
