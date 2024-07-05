@extends('layouts/layout-base')

@section('title')
    管理者画面
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/admin.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <form class="input-form" action="{{ route("admin.store") }}" method="POST">
            @csrf
            <input class="input-name" type="text" name="name" value="{{ old("name") }}">
            <input class="input-email" type="email" name="email" value="{{ old("email") }}">
            <input class="input-password" type="password" name="password">
            <select name="shop_id" id="shop_id">
                <option value="">--選んでください--</option>
                @foreach ($shops as $shop)
                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                @endforeach
            </select>
            <button type="submit">作成</button>

        </form>
    </div>
</main>
@endsection

