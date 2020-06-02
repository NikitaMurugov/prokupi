
@extends('layouts.app')

@section('title')Главная страница@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-5 window home__title">
        <div class="container-xl container-lg container-md container-sm ">
            <div class="row">
                @guest
                    <div class="col-12">

                        <h1 class="h2 mt-5 text-center ">ПРОКУПИ<span class="small text-muted" >.КУРГАН</span> - это площадка для Ваших объявлений!</h1>

                        <hr class="mt-5 border-bottom" style="width: 50%;">

                        <p class="mt-5 lead text-center">У вас завалялось что-то не нужное дома и ни как не доходят руки до того чтобы кому нибудь отдать?</p>
                        <p class="mt-0 lead text-center"><mark style="background: #eed3ff">Мы решим вашу  проблему!</mark></p>

                        <hr class="mt-5 border-bottom" style="width: 50%;">

                        <h1 class="h4 mt-5 text-center "> У нас вы можете:</h1>
                        <div class="mt-5 row">
                            <div class="col text-center">
                                <i class="fal fa-eye" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Смотреть</p>
                                </div>
                            <div class="col text-center">

                                <i class="fal fa-shopping-cart" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Покупать</p>
                                </div>
                            <div class="col text-center">
                                <i class="fal fa-hand-holding-usd" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Продавать</p>
                            </div>
                        </div>


                        <p class="my-5 text-center"><a href=""></a><i class="far fa-chevron-down" style="font-size: 20px; color: #CD75F6"></i></p>
                    </div>
                    <div style="display: none" class="col-4">
                        <form class="form-signin" method="POST" action="{{ route('login') }}" >
                            @csrf
                            <div class="text-center mb-4">
                                <a style="text-decoration: none" href="{{ route('home') }}">
                                    <div class="logo"  style="width: 190px; margin: 0 auto 50px">
                                        <span>прокупи</span><span class='logo-city'>.курган</span>
                                    </div>
                                </a>
                                <h1 class="h6 mb-3 font-weight-normal text-muted">*Для того  чтобы полноценно  пользоваться  сайтом  необходимо выполнить вход на сайт</h1>
                                <br>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control @error('email')is-invalid @enderror" placeholder="Email" name="email" required autofocus>
                                <label for="inputEmail">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control @error('password')is-invalid @enderror" placeholder="Пароль" name="password" required>
                                <label for="inputPassword">Пароль</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Запомнить меня
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                        </form>

                    </div>
                @else
                    <div class="col-12">

                        <h1 class="h2 mt-5 text-center ">ПРОКУПИ<span class="small text-muted" >.КУРГАН</span> - это площадка для Ваших объявлений!</h1>

                        <hr class="mt-5 border-bottom" style="width: 50%;">

                        <p class="mt-5 lead text-center">У вас завалялось что-то не нужное дома и ни как не доходят руки до того чтобы кому нибудь отдать?</p>
                        <p class="mt-0 lead text-center"><mark style="background: #eed3ff">Мы решим вашу  проблему!</mark></p>

                        <hr class="mt-5 border-bottom" style="width: 50%;">

                        <h1 class="h4 mt-5 text-center "> У нас вы можете:</h1>
                        <div class="mt-5 row">
                            <div class="col text-center">
                                <i class="fal fa-eye" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Смотреть</p>
                            </div>
                            <div class="col text-center">

                                <i class="fal fa-shopping-cart" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Покупать</p>
                            </div>
                            <div class="col text-center">
                                <i class="fal fa-hand-holding-usd" style="font-size: 50px"></i>
                                <p class="mt-4 lead">Продавать</p>
                            </div>
                        </div>


                        <p class="my-5 text-center"><a href=""></a><i class="far fa-chevron-down" style="font-size: 20px; color: #e1e1e1"></i></p>
                    </div>
                    <div style="display: none" class="col-4">
                        <form class="form-signin" method="POST" action="{{ route('login') }}" >
                            @csrf
                            <div class="text-center mb-4">
                                <a style="text-decoration: none" href="{{ route('home') }}">
                                    <div class="logo"  style="width: 190px; margin: 0 auto 50px">
                                        <span>прокупи</span><span class='logo-city'>.курган</span>
                                    </div>
                                </a>
                                <h1 class="h6 mb-3 font-weight-normal text-muted">*Для того  чтобы полноценно  пользоваться  сайтом  необходимо выполнить вход на сайт</h1>
                                <br>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control @error('email')is-invalid @enderror" placeholder="Email" name="email" required autofocus>
                                <label for="inputEmail">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control @error('password')is-invalid @enderror" placeholder="Пароль" name="password" required>
                                <label for="inputPassword">Пароль</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Запомнить меня
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                        </form>

                    </div>
                @endguest
            </div>
        </div>
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
