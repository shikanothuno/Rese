<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset("css/sanitize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/layout-base.css") }}">
        @yield('css')
    </head>
    <body>
        <div class="full-screen-menu" id="full-screen-menu">
            <div class="close-button" id="close-button">×</div>
            @auth
                <nav class="nav-menu" id="nav-menu">
                    <li class="nav-item"><a href="{{ route("shop-list") }}">Home</a></li>
                    <li class="nav-item"><form method="POST" action="{{ route("logout") }}">
                        @csrf
                        <button class="logout-button">Logout</button>
                    </form></li>
                    <li class="nav-item"><a href="{{ route("mypage") }}">Mypage</a></li>
                </nav>
            @endauth

            @guest
                <nav class="nav-menu" id="nav-menu">
                    <li class="nav-item"><a href="{{ route("shop-list") }}">Home</a></li>
                    <li class="nav-item"><a href="{{ route("register") }}">Registration</a></li>
                    <li class="nav-item"><a href="{{ route("login") }}">Login</a></li>
                </nav>
            @endguest
        </div>
        <div class="header">
            <div class="header-left">
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="line medium"></div>
                    <div class="line long"></div>
                    <div class="line short"></div>
                </div>

                <div class="logo_div">
                    <h2 class="logo">Rese</h2>
                </div>
            </div>

            @if(Route::currentRouteName() == "shop-list")
            <div class=search_div>
                <form class="search=form" id="search-form" action="{{ route("shop-list") }}">
                    @csrf

                    <select class="region__select" name="region" id="region" onchange="document.getElementById('search-form').submit()">
                        <option value="">All area</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}" {{ old('region', $select_region) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                        @endforeach
                    </select>
                    <select class="genre__select" name="genre" id="genre" onchange="document.getElementById('search-form').submit()">
                        <option value="">All genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre', $select_genre) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <img class="search-button" src="{{ asset("images/search.png") }}" alt="">
                    <input class="search__input" id="search" name="search" type="text" placeholder="Search ...">
                </form>
            </div>
            @endif
        </div>


        @yield('content')
        <script src="{{ asset("js/layout-base.js") }}"></script>
    </body>



</html>
