@extends('admin.layouts.app')

@section('title') Главная @endsection

@section('content')
    <h1 class="window-title">Последние поданные объявления:</h1>
    <div class="container-xl container-lg  container-md container-sm mb-5">
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
                            <a href="{{route('admin.edit.product', $product->id)}}" class="btn btn-danger">Управление</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"> Дата: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{route('admin.products')}}" class="text-muted text-center "><h1 class="h6">Все продукты...</h1></a>
    </div>
    <h1 class="window-title">Последние добавленные пользователи:</h1>
    <div class="container-xl container-lg  container-md container-sm mb-5">
        <div class="row">
            @foreach($users as $user)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <h1 class="h5 card-title overflow-hidden">{{ $user->name }}  {{ $user->s_name }}</h1>
                            <h1 class="h5 card-title overflow-hidden small">{{ $user->email }}</h1>
                            <h1 class="h5 card-title overflow-hidden small">{{ $user->phone_number }}</h1>
                            <p class="card-text card-text-fixed text-black-50">{{ $user->description }}</p>
                            <h1 class="h5 card-subtitle text-primary"></h1>
                        </div>
                        <div class="card-body">
                            {{--                            <a href="#" class="btn btn-sm btn-outline-info">{{ $product->category->name }}</a>--}}
                            <a href="{{route('admin.edit.user', $user->id)}}" class="btn btn-danger ">Управление</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"> Дата: {{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y') }}</small>
                            <small class="text-muted"> id: {{ $user->id }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{route('admin.products')}}" class="text-muted text-center"><h1 class="h6">Все пользователи...</h1></a>
    </div>

@endsection
