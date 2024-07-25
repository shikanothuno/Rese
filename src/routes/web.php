<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateStoreRepresentativeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\NoticeEmailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopImageController;
use App\Http\Controllers\StoreRepresentativeController;
use App\Http\Controllers\UpdateShopInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class,"index"])->middleware(['auth', 'verified'])->name('dashboard');

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

Route::controller(ReservationController::class)->group(function(){
    Route::post("/{shop}/detail","store")->middleware("auth")->name("reservation.store");
    Route::delete("/{reservation}/delete","delete")->middleware(["auth","reservation.user"])->name("reservation.delete");
    Route::get("/{reservation}/edit","edit")->middleware(["auth","reservation.user"])->name("reservation.edit");
    Route::put("/{reservation}","update")->middleware(["auth","reservation.user"])->name("reservation.update");
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

Route::controller(UpdateShopInfoController::class)->middleware(["auth","store.representative"])->group(function(){
    Route::put("/shop/{shop_id}","update")->name("store-representative.update");
});

Route::controller(ReviewController::class)->group(function(){
    Route::get("/reviews/{shop_id}/show","show")->name("reviews.show");
    Route::get("/reviews/create","create")->middleware("auth")->name("reviews.create");
    Route::post("/reviews/create","store")->middleware("auth")->name("reviews.store");
});

Route::controller(QRCodeController::class)->middleware("auth")->group(function(){
    Route::get("/{reservation}/qrcode","makeQRCode")->name("qrcode");
});

Route::controller(NoticeEmailController::class)->middleware(["auth","not.genaral.user"])->group(function(){
    Route::get("/notice-email","noticeEmail")->name("email.write");
    Route::post("/notice-email","sendNoticeEmail")->name("email.send");
});

Route::controller(ShopImageController::class)->middleware(["auth","store.representative"])->group(function(){
    Route::get("/{shop_id}/shop-image-show","showShopImages")->name("shop-images.show");
    Route::get("/shop-image-upload","uploadShopImageView")->name("shop-images.upload");
    Route::post("/shop-image-upload","uploadShopImage")->name("shop-images.store");
});

Route::controller(PaymentController::class)->middleware("auth")->group(function(){
    Route::get("/payment","payment")->name("payment");
    Route::post("/payment","paymentStore")->name("payment.store");
});

require __DIR__.'/auth.php';
