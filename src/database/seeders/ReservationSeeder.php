<?php

namespace Database\Seeders;

use App\Models\Reservation;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0;$i < 10;$i++){
            Reservation::create([
                "user_id" => 1,
                "shop_id" => 1,
                "number_of_people_booked" => $i + 1,
                "reservation_date_and_time" => new DateTime("2024-06-26 18:00:00"),
            ]);
        }
    }
}
