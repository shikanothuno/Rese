<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset("css/sanitize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/layout-base.css") }}">
        @yield('css')
    </head>
    <body>
        <div class="logo_div">
            <h2 class="logo">Rese</h2>
        </div>
        <form method="POST" action="{{ route("logout") }}">
            @csrf
            <button class="logout-button">ログアウト</button>
        </form>
        @if(Route::currentRouteName() == "shop-list")
        <div class=search_div>
            <form id="search-form" action="{{ route("shop-list") }}"></form>
            <select name="region" id="region" onchange="document.getElementById('search-form').submit()">
                <option value="">All area</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region', $select_region) == $region->name ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            <select name="genre" id="genre" onchange="document.getElementById('search-form').submit()">
                <option value="">All genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre', $select_genre) == $genre->name ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="Search ...">
        </div>
        @endif

        @yield('content')
    </body>



</html>
