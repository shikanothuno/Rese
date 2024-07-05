<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "email" => "admin@example.com",
            "password" => Hash::make("password"),
            "is_general_user" => false,
            "is_store_representative" => false,
            "is_admin" => true,
        ]);

        User::create([
            "name" => "store",
            "email" => "store@example.com",
            "password" => Hash::make("password"),
            "is_general_user" => false,
            "is_store_representative" => true,
            "is_admin" => false,
            "shop_id" => 1,
        ]);

        for($i = 0;$i < 100;$i++){
            User::create([
                "name" => "test" . strval($i),
                "email" => "test" . strval($i) . "@example.com",
                "password" => Hash::make("password"),
                "is_general_user" => true,
                "is_store_representative" => false,
                "is_admin" => false,
            ]);
        }
    }
}
