@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <table>
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
                                <select name="genre" data-toggle="select">
                                    <option value="">All genre</option>
                                    @foreach ($genres as $genres)
                                        <option value="{{ $genres->genre }}"
                                            @if ($genres == '{{ $genres->genre }}') selected @endif>{{ $genres->genre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <div>
                                <select name="area" data-toggle="select">
                                    <option value="">All area</option>
                                    @foreach ($areas as $areas)
                                        <option value="{{ $areas->area }}"
                                            @if ($areas == '{{ $shops->areas->area }}') selected @endif>
                                            {{ $areas->area }}</option>
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
        @foreach ($shops as $shops)
            <div class="card">
                <div class="img__inner">
                    <div class="img__card">
                        <img src="{{ $shops->image }}" alt="no image" class="img-item"></img>
                    </div>
                </div>
                <div class="card__content">
                    <div class="shop__content">{{ $shops->shop }}</div>
                    <div class="area__content">#{{ $shops->areas->area }}</div>
                    <div class="genre__content">#{{ $shops->genres->genre }}</div>
                    <div><a href="/detail/:shop_{{ $shops->id }}" class="btn-primary">詳しく見る</a></div>
                    @if ($bookmark == true)
                        <form action="/unbookmark" method="post" class="unbookmark__button">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $shops->shop_id }}">
                            <button class="unbookmark__button-submit" type="submit">いいね</button>
                        </form>
                    @else
                        <form action="/bookmark" method="post" class="bookmark__button">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $shops->shop_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="bookmark__button-submit" type="submit">いいね</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </table>
@endsection
