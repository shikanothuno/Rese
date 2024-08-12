@extends('layouts/layout-base')

@section('title')
    アクセスが禁止されています
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/errors.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text">
            アクセスが禁止されています。
        </div>
        <a href="{{ route("shop-list") }}" class="back-button">トップページに戻る</a>
    </div>
</main>
@endsection

