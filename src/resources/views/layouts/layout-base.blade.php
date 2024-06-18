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
            <h2 class="logo">Rase</h2>
        </div>
        @if(Request::routeIs(route("shop-list")))
        <div class=search_div>

        </div>
        @endif

        @yield('content')
    </body>



</html>
