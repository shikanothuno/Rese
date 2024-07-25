<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class PaymentController extends Controller
{
    public function payment()
    {
        return view("payment");
    }

    public function paymentStore(Request $request)
    {
        $request->session()->regenerateToken();

        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $charge = Charge::create([
            "amount" => 1000,
            "currency" => "jpy",
            "source" => $request->stripeToken,
        ]);

        return view("payment");
    }
}
