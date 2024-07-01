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
    
    //conversione booleana in stringa
    protected $casts = [ //$cast è una proprietà di Eloquent che viene utilizzata per specificare come dovrebbero essere convertiti i campi del database quando vengono recuperati. Prende i valori 0/1 e li trasforma in booleani.
        'visible' => 'boolean',
    ];

    public function getBooleanTextAttribute()
    {
        if ($this->visible == 1) {
            return 'Si';
        } else {
            return 'No';
        }
        /* return $this->visible==='1' ? 'Sì' : 'No';  */
    }

       

}
