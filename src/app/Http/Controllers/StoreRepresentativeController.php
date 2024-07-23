<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Region;
use App\Models\Shop;
use Illuminate\Http\Request;

class StoreRepresentativeController extends Controller
{
    public function storeRepresentative($shop_id)
    {
        $shop = Shop::find($shop_id);
        $genres = Genre::all();
        $regions = Region::all();

        return view("store-representative",compact("shop","genres","regions"));
    }
}
