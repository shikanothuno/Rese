@extends('layouts/layout-base')

@section('title')
    マイページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/my-page.css") }}">
@endsection

@section('content')
<main>
    <div class="mypage-header">
        <div class="user-name">{{ $user->name }}さん</div>
    </div>

    <div class="container">
        <div class="resevation-info">
            <h2 class="title">予約状況</h2>
            @foreach ($reservations as $reservation)
                <div class="reservation-infos" id="reservation-info-{{ $loop->index }}">
                    <div class="info-header">
                        <div class="info-header-left">
                            <img class="clock" src="{{ asset("images/clock.png") }}" alt="">
                            <div class="reservation-index">予約{{ $loop->iteration }}</div>
                        </div>
                        <div class="info-header-right">
                            <a href="{{ route("payment") }}"><img class="payment-button"
                                src="{{ asset("images/payment_button.png") }}" alt=""></a>
                            <a href="{{ route("qrcode",$reservation->id) }}"><img class="qrcode-button"
                                src="{{ asset("images/qrcode_button.png") }}" alt=""></a>
                            <a href="{{ route("reservation.edit",$reservation->id) }}"><img class="update-button"
                                src="{{ asset("images/update_button.png") }}" alt=""></a>
                            <a href="#" onclick="event.preventDefault();document.getElementById('{{ 'reservation-delete-form' . $reservation->id }}').submit();"><img class="delete-button"
                                src="{{ asset("images/close_button.png") }}" alt=""></a>
                            
                            <form id={{ 'reservation-delete-form' . $reservation->id }} action="{{ route("reservation.delete",$reservation->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </div>
                    <div class="info">
                        <table class="info__table">
                            <tr>
                                <td>Shop</td>
                                <td>{{ $reservation->shop->name }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ date("Y-m-d",strtotime($reservation->reservation_date_and_time)) }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ date("H:i:s",strtotime($reservation->reservation_date_and_time)) }}</td>
                            </tr>
                            <tr>
                                <td>Number</td>
                                <td>{{ $reservation->number_of_people_booked }}人</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="favorite-shops">
            <h2 class="title">お気に入り店舗</h2>
            <div class="shop-list">
                @foreach ($shops as $shop)
                <div class="shop-card">
                    <img class="shop-image" src="{{ asset($shop->image_url) }}" alt="">
                    <div class="shop-name">{{ $shop->name }}</div>
                    <div class="shop-region-and-genre">{{ "#" . $shop->region->name . " " . "#" . $shop->genre->name }}</div>
                    <div class="shop-footor">
                        <a class="shop-detail-button" href="{{ route("shop-detail",$shop->id) }}">詳しくみる</a>
                        <a class="review" href="{{ route("reviews.show",$shop->id) }}">口コミ</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('{{ 'favorite-delete-form' . $shop->id }}').submit();">
                            <img class="favorite-button" src="{{ asset("images/favorite_on.png") }}" alt="">
                        </a>
                        <form id="{{ 'favorite-delete-form' . $shop->id }}" action="{{ route("favorite.delete",$shop->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</main>

@endsection
