<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $user = Auth::user();

        return view("shop-list",compact("shops","user"));
    }

    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);
        return view("shop-detail",compact("shop"));
    }

    public function store(Request $request,$shop_id)
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

    public function done()
    {
        return view("done");
    }
}
