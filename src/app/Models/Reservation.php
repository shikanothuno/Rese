<?php

namespace App\Models;

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

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
