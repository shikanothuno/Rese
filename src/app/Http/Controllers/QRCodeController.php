<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function makeQRCode($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $generate_text = "店名:" . $reservation->shop->name . ",予約日時:" .
        $reservation->reservation_date_and_time . ",予約人数:" .
        $reservation->number_of_people_booked;

        $encoding_text = iconv("ISO-8859-1","utf-8",$generate_text);

        $qrCode = QrCode::size(300)->generate($encoding_text);

        return view("qrcode",compact("qrCode"));
    }
}
