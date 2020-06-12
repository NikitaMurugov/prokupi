
@extends('layouts.app')

@section('title')Главная страница@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-5">
        <div class="container-xl container-lg container-md container-sm ">
            <div class="row">
                <div class="col-12">

                    <h1 class="h2 mt-5 text-center ">ПРОКУПИ<span style="color: #CD75F6;  font-size: 16px">.КУРГАН</span> - это площадка для Ваших объявлений!</h1>

                    <hr class="mt-5 border-bottom" style="width: 50%;">

                    <p class="mt-5 lead text-center">У вас завалялось что-то не нужное дома и ни как не доходят руки до того чтобы кому нибудь отдать?</p>
                    <p class="mt-0 lead text-center"><mark style="background: #eed3ff">Мы решим вашу  проблему!</mark></p>

                    <hr class="mt-5 border-bottom" style="width: 50%;">

                    <h1 class="h4 mt-5 text-center "> У нас вы можете:</h1>
                    <div class="mt-5 row">
                        <div class="mb-5 col-sm-4 text-center">
                            <i class="fal fa-eye" style="font-size: 50px"></i>
                            <p class="my-4 lead">Смотреть</p>
                        </div>
                        <div class="mb-5 col-sm-4   text-center">

                            <i class="fal fa-shopping-cart" style="font-size: 50px"></i>
                            <p class="my-4 lead">Покупать</p>
                        </div>
                        <div class="col-sm-4  text-center">
                            <i class="fal fa-hand-holding-usd" style="font-size: 50px"></i>
                            <p class="my-4 lead">Продавать</p>
                        </div>
                    </div>


                    <p class="my-5 text-center"><a href=""></a><i class="far fa-chevron-down" style="font-size: 20px; color: #e1e1e1"></i></p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="window-title">Популярные категории товаров:</h1>
{{--    <div class="container-fluid container marketing">--}}
    <div class="window__sections">
        @foreach($categories as $category)
            <form method="get" action="{{ route('search') }}" style="text-decoration: none; color: #272727">
                @csrf
                <div class="section">
                    <div class="section-image" style="background-image: url({{  '/storage'. $category->img_url }});"> </div>
                    <div class="section-title">
                        <span>{{$category->name}} </span>
                        <small>({{ $category->products_count }})</small>
                    </div>
                    <input style="display: none" type="number" name="category_id" value="{{ $category->id }}">
                    <input style="display: none" type="submit" class="category-button">
                </div>
            </form>
        @endforeach
    </div>
    <h1 class="window-title">Последние поданные объявления:</h1>
    <div class="container-xl container-lg  container-md container-sm">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-img-top" style="background: url('{{ '/' . $product->img }}') center; width: 100%;height: 200px; background-size: cover; border-radius: 2px"></div>
                        <div class="card-body">
                            <h5 class="card-title overflow-hidden">{{ $product->name }}</h5>
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
