<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "shop_id",
        "number_of_people_booked",
        "reservation_date_and_time",
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createReservation($user_id, $shop_id, $number_of_people_booked, $reservation_date_and_time)
    {
        Reservation::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
            "number_of_people_booked" => $number_of_people_booked,
            "reservation_date_and_time" => $reservation_date_and_time->format("Y-m-d H:i:s"),
        ]);
    }

    public static function updateReservation($reservation, $request)
    {
        $reservation->user_id = $request->input("user_id");
        $reservation->shop_id = $request->input("shop_id");
        $reservation->number_of_people_booked = $request->input("number_of_people_booked");
        $reservation_date_and_time = new DateTime($request->input("date") . " " .
        $request->input("time"));
        $reservation->reservation_date_and_time = $reservation_date_and_time->format("Y-m-d H:i:s");
        $reservation->save();
    }
}
