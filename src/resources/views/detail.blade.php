@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<table>
    <tr>
        <img src="{{$shopdetail->image}}" alt="no image" class="img-item"></img>
        <div class="shop__content">{{$shopdetail->shop}}</div>
        <div class="area__content">#{{$shopdetail->area}}</div>
        <div class="genre__content">#{{$shopdetail->genre}}</div>
        <div class="genre__content">#{{$shopdetail->overview}}</div>
    </tr>
</table>
@endsection