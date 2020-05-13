@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('content')
  @auth
  <div class="window">
    <h1>будет личный кабинет</h1>
  </div>
  @else
    {{ route('login') }}
  @endauth
@endsection
