
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
{{--                <p>Если вы хотите выложить свой товар то <a href="{{ route("register") }}">зарегистрируйтесь</a>--}}
{{--                или <a href="{{ route("login") }}">войдите</a> на наш сайт.</p>--}}


            @else
                <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
            @endguest
    </div>

    <h1 class="window-title">Популярные категории товаров:</h1>
{{--    <div class="container-fluid container marketing">--}}
    <div class="window ">
            @foreach($categories as $category)
                <form method="get" action="{{ route('search') }}" style="text-decoration: none; color: #272727">
                    @csrf
                    <div class="section">
                        <div class="section-image" style="background-image: url({{  '/storage'. $category->img_url }});"> </div>
                        <div class="section-title">
                            {{$category->name}} ({{ $category->products_count }})
                        </div>
                        <input style="display: none" type="number" name="category_id" value="{{ $category->id }}">
                        <input style="display: none" type="submit" class="category-button">
                    </div>
                </form>
            @endforeach
    </div>
    <h1 class="window-title">Последние добавленные товары:</h1>
    <div class="container-xl container-lg  container-md container-sm">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-img-top" style="background: url('{{ '/' . $product->img }}') center; width: 100%;height: 200px; background-size: cover; border-radius: 2px"></div>
                        <div class="card-body">
                            <h5 class="card-title ">{{ $product->name }}</h5>
                            <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                            <p class="card-text card-text-fixed text-black-50">{{ $product->description }}</p>
                        </div>
                        <div class="card-body">
{{--                            <a href="#" class="btn btn-sm btn-outline-info">{{ $product->category->name }}</a>--}}
                            <a href="{{asset('products/' . $product->id)}}" class="text-muted small float-right">Подробнее..</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"> Дата: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push("scripts")
    <script>
        window.onload = function () {
            let sections = document.querySelectorAll('.section');
            sections.forEach(function (section) {
                section.addEventListener('click', function () {
                    let button = section.querySelector('.category-button');
                    button.click();
                })
            });
        };
    </script>
@endpush
