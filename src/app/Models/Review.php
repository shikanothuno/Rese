<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "shop_id",
        "comment",
        "rating",
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function shop()
    {
        $this->belongsTo(Shop::class);
    }

    public static function createReview($user_id, $shop_id, $comment, $rating)
    {
        Review::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
            "comment" => $comment,
            "rating" => $rating,
        ]);
    }
}
