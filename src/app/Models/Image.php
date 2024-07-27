<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        "shop_id",
        "image_name",
        "url",
        "is_s3",
    ];

    public static function storeImageInfo($shop_id, $image_name, $url, $is_s3)
    {
        Image::create([
            "shop_id" => $shop_id,
            "image_name" => $image_name,
            "url" => $url,
            "is_s3" => $is_s3,
        ]);
    }
}
