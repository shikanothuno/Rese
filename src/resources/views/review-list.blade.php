@extends('layouts/layout-base')

@section('title')
    口コミ一覧
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/review-list.css") }}">
@endsection

@section('content')
<main>
    <h2 class="shop-name">{{ $shop->name }}</h2>
    <div class="container">
        <div class="review-container">
            @foreach ($reviews as $review)
                <div class="review-card">
                    <table>
                        <tr>
                            <td class="label">評価</td>
                            <td class="review">
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
                            <td class="label">コメント</td>
                            <td class="review">{!! nl2br($review->comment) !!}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection

