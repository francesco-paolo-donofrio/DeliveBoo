<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = config('products_db.products');
        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->name = $product["name"];
            $new_product->image = $product["image"];
            $new_product->price = $product['price'];
            $new_product->description = $product["description"];
            $new_product->visible = $product["visible"];
            $new_product->restaurant_id = $product["restaurant_id"];
            $new_product->save();
        }
    }
}
