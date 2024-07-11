@extends('layouts/layout-base')

@section('title')
    予約情報更新
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/edit.css") }}">
@endsection

@section('content')
<main>

    <div class="container">
        <h2 class="title">予約変更</h2>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form class="reservation-form" method="POST" action="{{ route("reservation.update", $reservation->id) }}">
            @method("PUT")
            @csrf
            <input type="text" name="shop_id" value="{{ $reservation->shop_id }}" style="display: none">
            <input type="text" name="user_id" value="{{ $reservation->user_id }}" style="display: none">
            <input class="date" type="date" id="date" name="date" value="{{ date("Y-m-d",strtotime($reservation->reservation_date_and_time)) }}">
            <br>
            <input class="time" type="time" id="time" name="time" value="{{ date("H:i:s",strtotime($reservation->reservation_date_and_time)) }}">
            <br>
            <select class="people" id="people" name="number_of_people_booked">
                @for ($i = 1; $i <= 20; $i++)
                    <option value={{ $i }} {{ $i == $reservation->number_of_people_booked ? 'selected' : '' }}>{{ $i . "人" }}</option>
                @endfor
            </select>
        </form>
        <br>
        <div class="reservation-detail">
            <table class="reservation-detail__table">
                <tr>
                    <td>Shop</td>
                    <td>{{ $reservation->shop->name }}</td>
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
                    <td><span id="people-preview"></span>人</td>
                </tr>
            </table>
        </div>

        <button class="submit-button" onclick="document.getElementById('reservation-form').submit()">予約更新</button>
    </div>
</main>
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

document.getElementById("date").addEventListener("DOMContentLoaded",function(){
    document.getElementById("date-preview").textContent = this.value;
});

document.getElementById("time").addEventListener("DOMContentLoaded",function(){
    document.getElementById("time-preview").textContent = this.value;
});

document.getElementById("people").addEventListener("DOMContentLoaded",function(){
    document.getElementById("people-preview").textContent = this.value;
});

function submitForm(){
    document.getElementById('reservation-form').submit();
};
</script>
@endsection
