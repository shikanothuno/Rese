<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Favorite::create([
            "user_id" => 1,
            "shop_id" => 1,
        ]);
        Favorite::create([
            "user_id" => 1,
            "shop_id" => 4,
        ]);
        Favorite::create([
            "user_id" => 1,
            "shop_id" => 5,
        ]);
        Favorite::create([
            "user_id" => 1,
            "shop_id" => 8,
        ]);
    }
}
