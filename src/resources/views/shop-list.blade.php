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
            </div>

        </div>
        @endforeach

    </div>
</main>
@endsection


