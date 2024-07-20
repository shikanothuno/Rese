@extends('layouts/layout-base')

@section('title')
    お店画像登録
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/done.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <form action="{{ route("shop-images.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>店舗</td>
                    <td>
                        <select name="shop_id" id="">
                            <option value="">--選んでください--</option>
                            @foreach ($shops as $shop)
                                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ファイル</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>ファイル名</td>
                    <td><input type="text" name="image-name"></td>
                </tr>
            </table>
            <button type="submit">アップロード</button>
        </form>
    </div>
</main>
@endsection

