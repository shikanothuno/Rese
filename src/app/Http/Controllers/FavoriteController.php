<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FavoriteController extends Controller
{
    public function store(Request $request, $shop_id)
    {
        $request->session()->regenerateToken();
        $user_id = Auth::id();

        Favorite::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
        ]);

        return redirect()->back();

    }

    public function delete(Request $request, $shop_id)
    {
        Log::debug($shop_id);
        $request->session()->regenerateToken();
        $user_id = Auth::id();
        Favorite::where("user_id","=",$user_id)->where("shop_id","=",$shop_id)->get()->first()->delete();

        return redirect()->back();
    }
}
