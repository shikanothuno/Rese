@extends('layouts/layout-base')

@section('title')
    お知らせメール
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/notice-email.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($errors->all() as $error)
            <li class="error-message">{{ $error }}</li>
        @endforeach
        <form action="{{ route("email.send") }}" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <td>送り先</td>
                    <td>
                        <select name="email" id="">
                            <option value="">--選択してください--</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->email }}"{{ $user->email == old("email") ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>件名</td>
                    <td><input type="text" name="subject" value="{{ old("subject") }}"></td>
                </tr>
                <tr>
                    <td>メール本文</td>
                    <td><textarea name="text-body" id="" cols="30" rows="10">{{ old("text-body") }}</textarea></td>
                </tr>
            </table>
            <button type="submit">メール送信</button>
        </form>
    </div>
</main>
@endsection

