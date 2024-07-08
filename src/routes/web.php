<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateShopInfoContorller;
use App\Http\Controllers\CreateStoreRepresentativeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreRepresentativeController;
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

Route::controller(ShopController::class)->group(function(){
    Route::get("/","index")->name("shop-list");
    Route::get("/{shop}/detail","detail")->name("shop-detail");
    Route::get("/done","done")->name("done");
    Route::get("/mypage","myPage")->middleware("auth")->name("mypage");
});

Route::middleware("auth")->controller(ReservationController::class)->group(function(){
    Route::post("/{shop}/detail","store")->name("reservation.store");
    Route::delete("/{reservation}/delete","delete")->name("reservation.delete");
    Route::get("/{reservation}/edit","edit")->name("reservation.edit");
    Route::put("/{reservation}","update")->name("reservation.update");
});

Route::controller(FavoriteController::class)->group(function(){
    Route::post("/{shop}/favorite-store","store")->name("favorite.store");
    Route::delete("/{shop}/favorite-delete","delete")->name("favorite.delete");
});

Route::controller(AdminController::class)->middleware(["auth","admin"])->group(function(){
    Route::get("/admin","admin")->name("admin.admin");
});

Route::controller(CreateStoreRepresentativeController::class)->middleware(["auth","admin"])->group(function(){
    Route::post("/admin","store")->name("admin.store");
});

Route::controller(StoreRepresentativeController::class)->middleware(["auth","store.representative"])->group(function(){
    Route::get("/shop/{shop_id}/store-representative","storeRepresentative")->name("store-representative");
});

Route::controller(CreateShopInfoContorller::class)->middleware(["auth","store.representative"])->group(function(){
    Route::put("/shop/{shop_id}","update")->name("store-representative.update");
});

require __DIR__.'/auth.php';
