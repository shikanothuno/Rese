<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "is_general_user",
        "is_store_representative",
        "is_admin",
        "shop_id",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function createGeneralUser($name, $email, $password)
    {
        $user = User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password),
            "is_general_user" => true,
            "is_store_representative" => false,
            "is_admin" => false,
        ]);

        return $user;
    }

    public static function createStoreRepresentative($name, $email, $password, $shop_id)
    {
        User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password),
            "is_general_user" => false,
            "is_store_representative" => true,
            "is_admin" => false,
            "shop_id" => $shop_id,
        ]);
    }
}
