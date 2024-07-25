@extends('layouts/layout-base')

@section('title')
    お支払い
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/payment.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <form action="{{ route("payment.store") }}" method="POST">
            @csrf
            <div class="button">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="1000"
                    data-name="お支払い画面"
                    data-label="支払い"
                    data-description="現在はデモ画面です"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="JPY">
                </script>
            </form>
        </div>
    </div>
</main>
@endsection

