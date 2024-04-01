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
                </div>
            @endforeach
        </table>
    @endif
@endsection
