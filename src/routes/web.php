<?php

use App\Http\Controllers\ProfileController;
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
});

require __DIR__.'/auth.php';
