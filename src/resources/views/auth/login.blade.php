@extends('layouts/layout-base')

@section('title')
    ログインページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/login.css") }}">
@endsection

@section('content')
<main>
    <div class="login-container">
        <div class="login-header">
            <h2 class="login_text">Login</h2>
        </div>
        <form class="login-form" action="{{ route("login") }}" method="POST">
            @csrf
            <div class="form-group">
                <img class="logo-img" src="{{ asset("images/email.png") }}" alt="">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <img class="logo-img" src="{{ asset("images/password.png") }}" alt="">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="button-parent">
                <button type="submit" class="login-button">ログイン</button>
            </div>

        </form>
    </div>
</main>
@endsection


