@extends('layouts/layout-base')

@section('title')
    認証が必要です
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/errors.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text">
            認証が必要です。
        </div>
        <a href="{{ route("shop-list") }}" class="back-button">トップページに戻る</a>
    </div>
</main>
@endsection

