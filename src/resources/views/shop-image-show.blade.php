@extends('layouts/layout-base')

@section('title')
    お店画像一覧
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/shop-image-show.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($images as $image)
            <div class="images-card">
                <img src="{{ asset($image->url) }}" alt="">
                <div class="image-name">{{ $image->file_name }}</div>
            </div>
        @endforeach

    </div>
</main>
@endsection

