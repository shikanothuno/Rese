<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Region;
use App\Models\Reservation;
use App\Models\Shop;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $select_region = $request->input("region");
        $select_genre = $request->input("genre");
        $search_text = $request->input("search");

        Log::debug($search_text);

        $shops = Shop::query();
        if(!empty($select_genre)){
            $shops = $shops->where("genre","=",$select_genre);
        }
        if(!empty($select_region)){
            $shops = $shops->where("region","=",$select_region);
        }
        if(!empty($search_text)){
            $shops = $shops->where("name","LIKE","%{$search_text}%");
        }

        $shops = $shops->get();

        $user = Auth::user();
        $genres = Genre::all();
        $regions = Region::all();

        return view("shop-list",compact("shops","user","genres","regions","select_region","select_genre"));
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

    public function myPage()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $reservations = Reservation::where("user_id","=",$user_id)->get()->all();
        $favorites = Favorite::where("user_id","=",$user_id)->get()->all();
        $shops = array();
        for ($i = 0;$i < count($favorites);$i++){
            $shops[] = Shop::find($favorites[$i]->shop_id);
        }


        return view("my-page",compact("reservations","shops","user"));

    }
}
