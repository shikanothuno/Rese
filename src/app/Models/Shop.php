<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "region",
        "genre",
        "description",
        "image_url",
    ];

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
