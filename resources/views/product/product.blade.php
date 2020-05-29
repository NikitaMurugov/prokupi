@extends('layouts.app')

@section('title')Объявление "{{$product->name}}"@endsection

@section('content')
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Обьявление  пользователя: {{ $product->user->name }} {{ $product->user->s_name }} </h3><br>
    </div>
{{--    {{$product}}--}}

    <div class="container-xl container-lg container-md container-sm">

        <div class="card">
            <div class="card-header product-card__title">  <h4> {{$product->name}}</h4> <h4> {{$product->price}} <span class="font-weight-bold">₽</span></h4></div>
            <div class="card-body">
                <div class="card-title">

                </div>
            </div>

            <div class="card-footer">
                <small class="text-muted">Объявление было подано: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }} в  {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}</small>
            </div>
        </div>
    </div>
@endsection
