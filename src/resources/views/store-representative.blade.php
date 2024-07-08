@extends('layouts/layout-base')

@section('title')
    店舗代表者管理画面
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/store-representative.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <form class="input-form" action="{{ route("store-representative.update",$shop->id) }}" method="POST">
            @csrf
            @method("PUT")
            <table>
                <tr>
                    <td>店名</td>
                    <td><input type="text" name="name" value="{{ $shop->name }}"></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>
                        <select name="region_id" id="">
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $shop->region_id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td>
                        <select name="genre_id" id="">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $genre->id == $shop->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>説明</td>
                    <td><textarea name="description" id="" cols="30" rows="10">{{ $shop->description }}</textarea></td>
                </tr>
                <tr>
                    <td>画像URL</td>
                    <td><input type="text" name="image_url" value="{{ $shop->image_url }}"></td>
                </tr>
            </table>
            <button type="submit">更新</button>

        </form>
    </div>
</main>
@endsection

