@extends('layouts/layout-base')

@section('title')
    メール認証
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/verify-email.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text">
            ご登録ありがとうござます。
            ご登録のメールアドレスに、<br>
            メールアドレス確認リンクを
            送付いたしました。<br>
            確認リンクをクリックし、
            登録を完了してください。<br>
            メールが届いてない場合は、
            下記から再送してください。<br>
        </div>
        <form action="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">
                メールアドレスリンクの再送
            </button>
        </form>
    </div>

</main>
@endsection

