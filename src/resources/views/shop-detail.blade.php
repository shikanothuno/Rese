@extends('layouts/layout-base')

@section('title')
    店舗詳細ページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/shop-detail.css") }}">
@endsection

@section('content')
<main>
    <div class="shop-detail">
        <div class="shop-detail-header">
            <a href="{{ route("shop-list") }}">&lt</a>
            <h1 class="shop-name">{{ $shop->name }}</h1>
        </div>
        <div class="shop-img__div">
            <img src="{{ asset($shop->image_url) }}" alt="">
        </div>
        <div class="shop-region-and-genre">
            {{ "#" . $shop->region . " " . "#" . $shop->genre }}</div>
        <div class="shop-descrtion">{{ $shop->descriton }}</div>
    </div>
    <div class="reservation">
        <form action="{{ route("store",$shop->id) }}" method="POST">
            @csrf
            <label for="date">日付:</label>
            <input type="date" id="date" name="date" required>
            <br>
            <label for="time">時間:</label>
            <input type="time" id="time" name="time" required>
            <br>
            <label for="people">人数:</label>
            <select id="people" name="number_of_people_booked">
                @for ($i = 1; $i <= 20; $i++)
                    <option value={{ $i }}>{{ $i . "人" }}</option>
                @endfor
            </select>
            <br>
            <div class="reservation-detail"></div>
            <table>
                <tr>
                    <td>Shop</td>
                    <td>{{ $shop->name }}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><span id="date-preview"></span></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><span id="time-preview"></span></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td><span id="people-preview"></span></td>
                </tr>
            </table>
            <button type="submit">予約する</button>
        </form>
    </div>
</main>
@endsection

<script>
    document.getElementById("date").addEventListener("input",function(){
        document.getElementById("date-preview").textContent = this.value;
    });

    document.getElementById("time").addEventListener("input",function(){
        document.getElementById("time-preview").textContent = this.value;
    });

    document.getElementById("people").addEventListener("input",function(){
        document.getElementById("people-preview").textContent = this.value;
    });
</script>
