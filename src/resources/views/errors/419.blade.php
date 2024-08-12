@extends('layouts/layout-base')

@section('title')
    エラーが発生しました
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/errors.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text">
            エラーが発生しました。
        </div>
        <a href="{{ route("shop-list") }}" class="back-button">トップページに戻る</a>
    </div>
</main>
@endsection

