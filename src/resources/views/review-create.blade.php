@extends('layouts/layout-base')

@section('title')
    口コミ投稿
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/review-list.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form method="POST" action="{{ route("reviews.store") }}">
            @csrf
            <table>
                <tr>
                    <td>店名</td>
                    <td><select name="shop_id" id="">
                        <option value="">--選んでください--</option>
                        @foreach ($shops as $shop)
                            <option value="{{ $shop->id }}" {{ $shop->id == old("shop_id") ? 'selected' : '' }}>{{ $shop->name }}</option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <td>評価</td>
                    <td>
                        <select name="rating" id="">
                            <option value="">--選んでください--</option>
                            <option value="1" {{ 1 == old("rating") ? 'selected' : '' }}>★</option>
                            <option value="2" {{ 2 == old("rating") ? 'selected' : '' }}>★★</option>
                            <option value="3" {{ 3 == old("rating") ? 'selected' : '' }}>★★★</option>
                            <option value="4" {{ 4 == old("rating") ? 'selected' : '' }}>★★★★</option>
                            <option value="5" {{ 5 == old("rating") ? 'selected' : '' }}>★★★★★</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>コメント</td>
                    <td><textarea name="comment" id="" cols="30" rows="10">{{ old("comment") }}</textarea></td>
                </tr>
            </table>
            <button type="submit">作成</button>
        </form>
    </div>
</main>
@endsection

