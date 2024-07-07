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
        <form method="POST" action="{{ route("reservation.update", $reservation->id) }}">
            @method("PUT")
            @csrf
            <input type="text" name="shop_id" value="{{ $reservation->shop_id }}" style="display: none">
            <input type="text" name="user_id" value="{{ $reservation->user_id }}" style="display: none">
            <table>
                <tr>
                    <td>予約日時</td>
                    <td><input type="date" name="date" value="{{ date("Y-m-d",strtotime($reservation->reservation_date_and_time)) }}"></td>
                </tr>
                <tr>
                    <td>予約時刻</td>
                    <td><input type="time" name="time" value="{{ date("H:i:s",strtotime($reservation->reservation_date_and_time)) }}"></td>
                </tr>
                <tr>
                    <td>予約人数</td>
                    <td>
                        <select class="people" id="people" name="number_of_people_booked">
                            <option value="">--選択してください。--</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value={{ $i }}>{{ $i . "人" }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit">予約更新</button>
        </form>
    </div>
</main>
@endsection
