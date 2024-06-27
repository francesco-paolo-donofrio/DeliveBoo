<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = config('restaurants_db.restaurants');
        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name = $restaurant["name"];
            $new_restaurant->image = $restaurant["image"];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->description = $restaurant["description"];
            $new_restaurant->vat = $restaurant["VAT"];
            $new_restaurant->user_id = $restaurant["user_id"];
            $new_restaurant->save();
        }
    }
}
