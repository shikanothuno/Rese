<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use App\Models\Image;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ShopImageController extends Controller
{
    public function showShopImages($shop_id)
    {
        $images = Image::where("shop_id","=",$shop_id)->get()->all();
        return view("shop-image-show",compact("images"));
    }

    public function uploadShopImageView()
    {
        $shops = Shop::all();
        return view("shop-image-upload",compact("shops"));
    }

    public function uploadShopImage(UploadImageRequest $request)
    {
        $request->session()->regenerateToken();

        if($request->input("is_s3") === "on"){
            $is_s3 = true;
        }else{
            $is_s3 = false;
        }

        $image_name = $request->input("image_name");
        $shop_id = $request->input("shop_id");

        if($is_s3){
            $path = Storage::disk("s3")->putFileAs("images",$request->file("image"),$image_name);
            $url = Storage::disk("s3")->url($path);
        }else{
            $path = $request->file("image")->storeAs("images",$image_name,"public");
            $url = Storage::url($path);
        }

        Image::storeImageInfo($shop_id, $image_name, $url, $is_s3);

        return redirect(route("shop-images.upload"));
    }
}
