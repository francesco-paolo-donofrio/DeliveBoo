<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = []; 

    public static function generateSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = 1;
        while (Restaurant::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
