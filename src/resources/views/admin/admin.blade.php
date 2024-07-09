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
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <table>
                <tr>
                    <td>名前</td>
                    <td><input class="input-name" type="text" name="name" value="{{ old("name") }}"></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><input class="input-email" type="email" name="email" value="{{ old("email") }}"></td>
                </tr>
                <tr>
                    <td>パスワード</td>
                    <td><input class="input-password" type="password" name="password"></td>
                </tr>
                <tr>
                    <td>店名</td>
                    <td>
                        <select name="shop_id" id="shop_id">
                            <option value="">--選んでください--</option>
                            @foreach ($shops as $shop)
                                <option value="{{ $shop->id }}" {{ $shop->id == old("shop_id") ? 'selected' : '' }}>{{ $shop->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>




            <button type="submit">作成</button>

        </form>
    </div>
</main>
@endsection

