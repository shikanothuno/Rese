<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShopInfoRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class CreateShopInfoContorller extends Controller
{
    public function update(CreateShopInfoRequest $request, $shop_id)
    {
        $shop = Shop::find($shop_id);
        $request->session()->regenerateToken();
        $name = $request->input("name");
        $region_id = $request->input("region_id");
        $genre_id = $request->input("genre_id");
        $description = $request->input("description");
        $image_url = $request->input("image_url");

        Shop::updateShopInfo($shop, $name, $region_id, $genre_id, $description, $image_url);

        return redirect(route("shop-list"));
    }
}
