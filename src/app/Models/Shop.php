<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "region_id",
        "genre_id",
        "description",
        "image_url",
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public static function updateShopInfo($shop, $name, $region_id, $genre_id, $description, $image_url)
    {
        $shop->name = $name;
        $shop->region_id = $region_id;
        $shop->genre_id = $genre_id;
        $shop->description = $description;
        $shop->image_url = $image_url;
        $shop->save();
    }


}
