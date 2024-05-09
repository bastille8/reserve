@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <table>
        <tr>
            <img src="{{ $shopdetail->image }}" alt="no image" class="img-item"></img>
            <div class="shop__content">{{ $shopdetail->shop }}</div>
            <div class="area__content">#{{ $shopdetail->areas->area }}</div>
            <div class="genre__content">#{{ $shopdetail->genres->genre }}</div>
            <div class="genre__content">{{ $shopdetail->overview }}</div>
        </tr>

        <div class="reserve-group">
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
                        <div class="text-secondary sales-delete" type="button"><i class="fas fa-2x fa-minus-circle"></i>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('days')
                            <tr>
                                <td>
                                    {{ $errors->first('days') }}
                                </td>
                            </tr>
                        @enderror
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
                    <div class="form__error">
                        @error('times')
                            <td>
                                {{ $errors->first('times') }}
                            </td>
                        @enderror
                    </div>
                </div>
                {{-- 人数 --}}
                <div class="form-group">
                    <select class="form-select" id="number-of-people" name="number_of_people">
                        <option value="" selected="">未選択</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}人</option>
                        @endfor
                    </select>
                    <div class="form__error">
                        @error('numbers')
                            <td>
                                {{ $errors->first('numbers') }}
                            </td>
                        @enderror
                    </div>
                </div>
                @if (Auth::check())
                    <button class="reserve__button-submit" type="submit">予約する</button>
                @else
                    <div class="login__link">
                        <a class="login__button-submit" href="/login">予約する</a>
                    </div>
                @endif
            </form>
        </div>
        <div class="review-group">
            <form action="/review" method="post" class="review__button">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shopdetail->shop_id }}">
                <span class="form__label--item">5段階評価</span>
                <div class="form__group">
                    <input class="btn  btn-primary" type="radio" name="value" value="1">
                    <input class="btn  btn-primary" type="radio" name="value" value="2">
                    <input class="btn  btn-primary" type="radio" name="value" value="3">
                    <input class="btn  btn-primary" type="radio" name="value" value="4">
                    <input class="btn  btn-primary" type="radio" name="value" value="5">
                    <div class="form__group-title">
                        <span class="form__label--item">コメント欄</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="comment" value="{{ old('comment') }}" />
                        </div>
                    </div>
                </div>
                @if (Auth::check())
                    <button class="review__button-submit" type="submit">投稿する</button>
                @else
                    <div class="login__link">
                        <a class="login__button-submit" href="/login">投稿する</a>
                    </div>
                @endif
            </form>
        </div>
    </table>
@endsection
