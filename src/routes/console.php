<?php

use App\Models\Reservation;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function(){
    $today = date("Y-m-d");
    $reservations = Reservation::whereDate("reservation_date_and_time",$today)->get()->all();
    foreach($reservations as $reservation){
        $text_body = "本日は" . $reservation->shop->name . "への予約日です。";
        Mail::raw($text_body,function($message) use($reservation){
            $message->to($reservation->user->email)->subject("ご予約のお知らせ");
        });
    }
})->daily();
