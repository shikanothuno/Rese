@extends('layouts/layout-base')

@section('title')
    口コミ一覧
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/review-list.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <h2 class="shop-name">{{ $shop->name }}</h2>
        @foreach ($reviews as $review)
            <table>
                <tr>
                    <td>評価</td>
                    <td>
                        @for ($i = 1; $i <=5 ; $i++)
                            @if ($i <= $review->rating)
                                <span class="star">★</span>
                            @else
                                <span class="star">☆</span>
                            @endif
                        @endfor
                    </td>
                </tr>
                <tr>
                    <td>コメント</td>
                    <td>{!! nl2br($review->comment) !!}</td>
                </tr>
            </table>
        @endforeach
    </div>
</main>
@endsection

