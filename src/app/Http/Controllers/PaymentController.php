<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view("payment");
    }

    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey(config("stripe.stripe_secret_key"));

        return redirect(route("payment.store"));
    }
}
