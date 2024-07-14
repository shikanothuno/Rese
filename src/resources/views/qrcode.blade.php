@extends('layouts/layout-base')

@section('title')
    QRコード
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/qrcode.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        {!! $qrCode !!}
    </div>
</main>
@endsection

