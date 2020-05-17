
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
                <div  style="background: url('{{ asset('/storage/' . $product->img) }}'); width: 100%;height: 200px; background-size: cover; background-position: center; border-radius: 2px"></div>
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
