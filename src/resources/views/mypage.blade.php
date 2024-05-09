@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    @if (Auth::check())
        <table>
            <div class="reserve__message">
                {{ Auth::user()->name }}さん
            </div>
            @foreach ($reserve as $reserve)
                <div class="reserve__content">
                    <div class="shop__content">{{ $reserve->shops->shop }}</div>
                    <div class="days__content">{{ $reserve->days }}</div>
                    <div class="times__content">{{ $reserve->times }}</div>
                    <div class="numbers__content">{{ $reserve->numbers }}</div>
                    <div><a href="/detail/:shop_{{ $reserve->shops->id }}" class="btn-primary">予約情報の変更</a></div>
                </div>
            @endforeach
            @foreach ($bookmark as $bookmark)
                <div class="card">
                    <div class="img__inner">
                        <div class="img__card">
                            <img src="{{ $bookmark->shops->image }}" alt="no image" class="img-item"></img>
                        </div>
                    </div>
                    <div class="card__content">
                        <div class="shop__content">{{ $bookmark->shops->shop }}</div>
                        <div class="area__content">#{{ $bookmark->shops->areas->area }}</div>
                        <div class="genre__content">#{{ $bookmark->shops->genres->genre }}</div>
                        <div><a href="/detail/:shop_{{ $bookmark->shops->id }}" class="btn-primary">詳しく見る</a></div>
                        <form action="/unbookmark" method="post" class="unbookmark__button">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $bookmark->shops->shop_id }}">
                            <button class="unbookmark__button-submit" type="submit">いいね</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </table>
    @endif
@endsection
