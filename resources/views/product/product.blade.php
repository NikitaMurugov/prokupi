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
            <div class="card-header product-card__title">  <h4> {{$product->name}}</h4> <h4>Цена: {{$product->price}} <span class="">₽</span></h4></div>
            <div class="row">
            <div class="card-body col-8">
                <div class="card-img-left" style="background: url('{{'/storage/!/thumbs/products/' . $product->img}}') center no-repeat;height: 450px; background-size: cover; border-radius: 10px;  border: 1px  solid #6c757d" ></div>

            </div>
            <div class="card-body col-4">
                <div class="card-body__phone"> {{ $product->phone_number }} </div>
                <span class="text-muted small">Контактное лицо: </span>
                <div class="card-body__user text-primary"><a href="#">{{ $product->user->name }} {{ $product->user->s_name }}</a></div>

            </div>
            </div>
            <div class="card-footer">
                <small class="text-muted float-left">Объявление было подано: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }} в  {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}</small>
                <form action="{{route('delete.product')}}"></form>
                @if(Auth::id() == $product->user_id)
                    <a href="{{ route('product.edit', $product->id) }}"><small class="float-right text-info font-weight-bold"><i class="far fa-pencil"></i> Редактировать объявление</small></a>
                @endif
            </div>
        </div>
    </div>
@endsection
