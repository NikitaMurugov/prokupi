
@extends('layouts.app')

@section('title')Главная страница@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="window window__title">
        @guest
            <h1>Добро пожаловать, гость!</h1>
            <p>Если вы хотите выложить свой товар то <a href="{{ route("register") }}">зарегистрируйтесь</a>
            или <a href="{{ route("login") }}">войдите</a> на наш сайт.</p>
        @else
            <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
        @endguest
    </div>

    <h1 class="window-title">Популярные категории товаров:</h1>
{{--    <div class="container-fluid container marketing">--}}
    <div class=" container-xl container-lg container-md container-sm">
        <div class="row row-conformity row-centered">
            @foreach($categories as $category)
                <a href="" style="text-decoration: none; color: #272727">
                    <div class="section ">
                        <div class="section-image" style="background-image: url({{  '/storage'. $category->img_url }});"> </div>
                        <div class="section-title">
                            {{$category->name}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <h1 class="window-title">Последние добавленные товары:</h1>
    <div class="content container-fluid ">
        @foreach($products as $product)
            <div class="card  col-2" style="width: 18rem;">
                <div  style="background: url('{{ '/storage' . $product->img_url }}'); width: 100%;height: 200px; background-size: cover; background-position: center; border-radius: 2px"></div>
                <div class="card-body">
                    <h5 class="card-title ">{{ $product->name }}</h5>
                    <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                    <p class="card-text text-black-50">{{ $product->description }}</p>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-outline-info">{{ $product->category->name }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
