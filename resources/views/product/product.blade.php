@extends('layouts.app')

@section('title')Продукт@endsection

@section('content')
    @auth
        {{ route('login') }}
    @endauth
    <h1>Здесь  страница продукта</h1>
@endsection
