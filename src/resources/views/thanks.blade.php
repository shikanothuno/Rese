@extends('layouts/layout-base')

@section('title')
    会員登録ありがとうございます
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/thanks.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="message-box">
          <p class="message">会員登録ありがとうございます</p>
          <a href="{{ route("login") }}" class="login-button">ログインする</a>
        </div>
    </div>
</main>
@endsection

