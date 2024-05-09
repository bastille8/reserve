@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')
    <table>
        <div class="main">
            <div class="home__link">
                <a class="home__button-submit" href="/">home</a>
            </div>
            <div class="main2">
                @if (Auth::check())
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <a class="header-nav__button">logout</a>
                    </form>
                @else
                    <a class="home__button-submit" href="/register">register</a>
                @endif
            </div>
            <div class="main3">
                @if (Auth::check())
                    <a class="header-nav__link" href="/mypage">mypage</a>
                @else
                    <a class="home__button-submit" href="/login">login</a>
                @endif
            </div>
        </div>
    </table>
@endsection
