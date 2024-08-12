@extends('layouts/layout-base')

@section('title')
    ページが見つかりません
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/errors.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text">
            ページが見つかりませんでした。
        </div>
        <a href="{{ route("shop-list") }}" class="back-button">トップページに戻る</a>
    </div>
</main>
@endsection

