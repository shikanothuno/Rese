<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request,$shop_id)
    {
        $request->session()->regenerateToken();

        $reservation_date_and_time = new DateTime($request->input("date") . " " .
        $request->input("time"));
        Reservation::create([
            "user_id" => Auth::user()->id,
            "shop_id" => $shop_id,
            "number_of_people_booked" => $request->input("number_of_people_booked"),
            "reservation_date_and_time" => $reservation_date_and_time->format("Y-m-d H:i:s"),
        ]);

        return redirect(route("done"));
    }

    public function delete(Request $request,$reservation_id)
    {
        $request->session()->regenerateToken();
        Log::debug($reservation_id);

        Reservation::find($reservation_id)->delete();

        return redirect(route("mypage"));
    }
}
