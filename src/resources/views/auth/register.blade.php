@extends('layouts/layout-base')

@section('title')
    会員登録ページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/register.css") }}">
@endsection

@section('content')
<main>
    <div class="register-container">
        <div class="register-header">
            <h2 class="register_text">Registration</h2>
        </div>
        <form class="register-form" action="{{ route("register") }}" method="POST">
            @csrf
            <div class="form-group">
                <img class="logo-img" src="{{ asset("images/username.png") }}" alt="">
                <input type="text" id="name" name="name" placeholder="Username" required>
            </div>
            <div class="form-group">
                <img class="logo-img" src="{{ asset("images/email.png") }}" alt="">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <img class="logo-img" src="{{ asset("images/password.png") }}" alt="">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="button-parent">
                <button type="submit" class="register-button">登録</button>
            </div>

        </form>
    </div>
</main>
@endsection


