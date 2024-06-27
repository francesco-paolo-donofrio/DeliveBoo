<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Restaurant extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
