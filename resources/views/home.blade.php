
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
    <div class="window window__sections">
        @foreach($categories as $category)
            <div class="section">
                <div class="section-image"></div>
                <div class="section-title">
                    {{$category->name}}
                </div>
            </div>
        @endforeach
    </div>
    <h1 class="window-title">Последние добавленные товары:</h1>
    <div class="d-flex flex-wrap p-2 justify-content-between">
        @foreach($products as $product)
            <div class="card  m-3" style="width: 18rem;">
                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17213cdbf45%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17213cdbf45%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.1171875%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title ">{{ $product->name }}</h5>
                    <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                    <p class="card-text text-black-50">{{ $product->description }}</p>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-outline-info">{{ $categories[$product->category_id]->name }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
