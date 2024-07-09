<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request,$shop_id)
    {
        $request->session()->regenerateToken();

        $reservation_date_and_time = new DateTime($request->input("date") . " " .
        $request->input("time"));
        $user_id = Auth::user()->id;
        $number_of_people_booked = $request->input("number_of_people_booked");
        Reservation::createReservation($user_id, $shop_id, $number_of_people_booked, $reservation_date_and_time);


        return redirect(route("done"));
    }

    public function delete(Request $request,$reservation_id)
    {
        $request->session()->regenerateToken();

        Reservation::find($reservation_id)->delete();

        return redirect(route("mypage"));
    }

    public function edit($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        return view("edit",compact("reservation"));
    }

    public function update(ReservationRequest $request,$reservation_id)
    {
        $request->session()->regenerateToken();

        $reservation = Reservation::find($reservation_id);

        Reservation::updateReservation($reservation, $request);

        return redirect(route("mypage"));
    }
}
