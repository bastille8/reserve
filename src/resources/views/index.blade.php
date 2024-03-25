@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<table>
  @foreach ($shops as $shops)
  <div class="card">
    <div class="img__inner">
      <div class="img__card">
        <img src="{{$shops->image}}" alt="no image" class="img-item"></img>
      </div>
    </div>
    <div class="card__content">
      <div class="shop__content">{{$shops->shop}}</div>
      <div class="area__content">#{{$shops->area}}</div>
      <div class="genre__content">#{{$shops->genre}}</div>
      <div><a href="/detail/:shop_{{$shops->id}}" class="btn-primary">詳しく見る</a></div>
    </div>
  </div>
  @endforeach
</table>
@endsection