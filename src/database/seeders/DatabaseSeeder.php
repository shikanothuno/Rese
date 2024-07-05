<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenreSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
