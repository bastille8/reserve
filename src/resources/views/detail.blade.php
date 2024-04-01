@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <table>
        <tr>
            <img src="{{ $shopdetail->image }}" alt="no image" class="img-item"></img>
            <div class="shop__content">{{ $shopdetail->shop }}</div>
            <div class="area__content">#{{ $shopdetail->areas->area }}</div>
            <div class="genre__content">#{{ $shopdetail->genres->genre }}</div>
            <div class="genre__content">#{{ $shopdetail->overview }}</div>
        </tr>
        <form action="/done" method="post" class="reserve__button">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shopdetail->shop_id }}">
            {{-- 年月日 --}}
            @php
                $today = date('Y-m-d');
            @endphp
            <div class="form-group">
                <div class="form-inline sales-input-area mb-2">
                    <div class="input-group mr-3">
                        <input type="date" min="{{ $today }}" name="date" class="form-control sale"
                            value=""></input>
                    </div>
                    <div class="text-secondary sales-delete" type="button"><i class="fas fa-2x fa-minus-circle"></i></div>
                </div>
            </div>
            {{-- 時間 --}}
            <div class="form-group">
                <select name="car_time" id="car_time" style="">
                    <option value="" selected="">未選択</option>
                    @for ($i = 7; $i <= 20; $i++)
                        @for ($j = 0; $j <= 5; $j++)
                            <option label="{{ $i }}:{{ $j }}0"
                                value="{{ $i }}:{{ $j }}0">
                                {{ $i }}:{{ $j }}0
                            </option>
                        @endfor
                    @endfor
                </select>
            </div>
            {{-- 人数 --}}
            <div class="form-group">
                <select class="form-select" id="number-of-people" name="number_of_people">
                    <option value="" selected="">未選択</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}人</option>
                    @endfor
                </select>
            </div>
            @if (Auth::check())
                <button class="reserve__button-submit" type="submit">予約する</button>
            @else
                <div class="login__link">
                    <a class="login__button-submit" href="/login">予約する</a>
                </div>
            @endif
        </form>
    </table>
@endsection
