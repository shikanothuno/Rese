<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware("auth")->controller(ShopController::class)->group(function(){
    Route::get("/","index")->name("shop-list");
    Route::get("/{shop}/detail","detail")->name("shop-detail");
    Route::post("/{shop}/detail","store")->name("store");
    Route::get("/done","done")->name("done");
    Route::get("/mypage","myPage")->name("mypage");
});

Route::middleware("auth")->controller(ReservationController::class)->group(function(){
    Route::post("/{shop}/detail","store")->name("reservation.store");
    Route::delete("/{reservation}/delete","delete")->name("reservation.delete");
});

Route::controller(FavoriteController::class)->group(function(){
    Route::post("/{shop}/favorite-store","store")->name("favorite.store");
    Route::delete("/{shop}/favorite-delete","delete")->name("favorite.delete");
});

require __DIR__.'/auth.php';
