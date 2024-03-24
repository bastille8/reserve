@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<table>
  @foreach ($shops as $shops)
  <tr>
    <td>{{$shops->shop}}</td>
    <td>#{{$shops->area}}</td>
    <td>#{{$shops->genre}}</td>
  </tr>
  @endforeach
</table>
@endsection