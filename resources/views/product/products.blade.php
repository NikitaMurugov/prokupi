@extends('layouts.app')

@section('title')Объявления по запросу - {{$prod_count}}@endsection

@section('content')
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Всего товаров по вашему запросу: {{ $prod_count }}</h3><br>
    </div>
    <div class="container-xl container-lg container-md container-sm">
        <form action="{{ route('search') }}" class="form-inline mt-2 mt-md-0">
            @csrf
            <input id="search" type="text"  class="form-control mr-sm-2" name="search" placeholder="Строка поиска" value="{{$search}}">
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0 " value="Поиск">
        </form><br>

        <div class="content"></div>
        @foreach($products as $product)
            <div class="card">
                <div class="card-img-left" style="background: url('{{ '/' . $product->img_url }}') left; width: 200px;height: 200px; background-size: cover; border-radius: 2px"></div>
                <div class="card-body">
                    <h5 class="card-title ">{{ $product->name }}</h5>
                    <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                    <p class="card-text text-black-50">{{ $product->description }}</p>
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-sm btn-outline-info">{{ $product->category->name }}</a>
                    <a href="" class="text-muted small">Подробнее..</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Добавлено: {{ $product->created_at }}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection
