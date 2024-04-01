@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <table>
        <div>ご登録ありがとうございます</div>
        <div class="login__link">
            <a class="login__button-submit" href="/login">ログインする</a>
        </div>
        </div>
    </table>
@endsection
