@extends('layouts/layout-base')

@section('title')
    店舗一覧ページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/shop-list.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($shops as $shop)
        <div class="card">
            <img class="shop-img" src="{{ $shop->image_url }}" alt="">
            <h3 class="shop-name">{{ $shop->name }}</h3>
            <h4 class="shop-region-and-genre">
                {{ "#" . $shop->region . " " . "#" . $shop->genre }}</h4>
            <div class="card-footer">
                <a href="{{ route("shop-detail",$shop->id) }}"
                     class="detail-button">詳しくみる</a>
                @if ($favorites && $favorites->contains('shop_id', $shop->id))
                    <img class="favorite" id="favorite-on" data-id="{{ $shop->id }}" src="{{ asset("images/favorite_on.png") }}" alt="">
                @else
                    <img class="favorite" id="favorite-off" data-id="{{ $shop->id }}" src="{{ asset("images/favorite_off.png") }}" alt="">
                @endif
            </div>

        </div>
        @endforeach

    </div>
</main>
@endsection


