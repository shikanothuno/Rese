<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request, $shop_id)
    {
        $request->session()->regenerateToken();
        $user_id = Auth::user()->id;

        Favorite::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
        ]);

    }

    public function delete(Request $request, $shop_id)
    {
        $request->session()->regenerateToken();
        $user_id = Auth::user()->id;
        Favorite::where("user_id","=",$user_id)->where("shop_id","=",$shop_id)->get()->first()->delete();
    }
}
