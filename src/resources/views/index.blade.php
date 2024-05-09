@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <table>
        <div><a href="/shopedit" class="btn-primary">店舗登録</a></div>
        <div class="search">
            <form action="/" method="get">
                @csrf
                <div class="form-group">
                    <div>
                        <label for="">
                            <div>
                                <input type="text" name="shop" value="">
                            </div>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <div>
                                <select name="genre_id" data-toggle="select">
                                    <option value="">All genre</option>
                                    @foreach ($allgenre as $genres)
                                        <option value="{{ $genres->id }}"
                                            @if ($genres == '{{ $genres->id }}') selected @endif>{{ $genres->genre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <div>
                                <select name="area_id" data-toggle="select">
                                    <option value="">All area</option>
                                    @foreach ($allarea as $areas)
                                        <option value="{{ $areas->id }}"
                                            @if ($areas == '{{ $areas->id }}') selected @endif>{{ $areas->area }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div>
                        <input type="submit" class="btn" value="検索">
                    </div>
                </div>
            </form>
        </div>
        @foreach ($search as $search)
            <div class="card">
                <div class="img__inner">
                    <div class="img__card">
                        <img src="{{ $search->image }}" alt="no image" class="img-item"></img>
                    </div>
                </div>
                <div class="card__content">
                    <div class="shop__content">{{ $search->shop }}</div>
                    <div class="area__content">#{{ $search->areas->area }}</div>
                    <div class="genre__content">#{{ $search->genres->genre }}</div>
                    <div><a href="/detail/:shop_{{ $search->id }}" class="btn-primary">詳しく見る</a></div>
                    @if ($bookmark == true)
                        <form action="/unbookmark" method="post" class="unbookmark__button">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $search->shop_id }}">
                            <button class="unbookmark__button-submit" type="submit">いいね</button>
                        </form>
                    @else
                        <form action="/bookmark" method="post" class="bookmark__button">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $search->shop_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="bookmark__button-submit" type="submit">いいね</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </table>
@endsection
