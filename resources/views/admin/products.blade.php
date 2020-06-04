@extends('admin.layouts.app')

@section('title') Продукты @endsection

@section('content')

    <div class="my-5 container-xl container-lg container-md container-sm" style="display: flex; justify-content: space-around; align-items: center;">

        <a class="btn btn-dark" href="#nondel">Все товары</a>
        <a class="btn btn-dark" href="#del">Завершенные объявления</a>
    </div>


    <h1 class="window-title"id="nondel">Все объявления:</h1>

    <div class="container-fluid" >
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="font-size: 18px">#</th>
                    <th scope="col" style="font-size: 18px; max-width: 100px">Пользователь</th>
                    <th scope="col" style="font-size: 18px">Название</th>
                    <th scope="col" style="font-size: 18px">Описание</th>
                    <th scope="col" style="font-size: 18px">Цена</th>
                    <th scope="col" style="font-size: 18px">Телефон</th>
                    <th scope="col" style="font-size: 18px">Адрес</th>
                    <th scope="col" style="font-size: 18px">Дата</th>
                    <th scope="col" style="font-size: 18px">Картинка</th>
                    <th scope="col" style="font-size: 18px"><i class="far fa-trash-alt"></i></th>
                    <th scope="col" style="font-size: 18px"><i class="far fa-pencil"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row" style="font-size: 14px">{{$product->id}}</th>
                            <td style="font-size: 14px">{{$product->user->name}}</td>
                            <td style="font-size: 14px">{{$product->name}}</td>
                            <td style="font-size: 14px; max-width: 400px">
                                <span style="display:block;max-height: 100px; overflow: auto">{{$product->description}}</span></td>
                            <td style="font-size: 14px">{{$product->price}}</td>
                            <td style="font-size: 14px; width:150px">{{$product->phone_number}}</td>
                            <td style="font-size: 14px; max-width: 200px">
                                <span style="display:block;max-height: 100px; overflow: auto">{{$product->location}}</span></td>
                            <td style="font-size: 14px">
                                {{$product->created_at}}
                            </td>
                            <td style="font-size: 14px">
                                <div class="card-img-top" style="background: url('{{ '/' . $product->img }}') center; width: 100px;height: 100px; background-size: cover; border-radius: 10px; border: 1px solid"></div>

                            </td>
                            <td style="font-size: 18px" >
                                <form action="{{ route('admin.delete.product', $product->id ) }}" method="post">
                                    @csrf
                                    <button type="submit" style="background: #fff; border: 0"><i class="far fa-trash-alt" style="color: #DD1144;"></i></button>
                                </form>
                            </td>
                            <td style="font-size: 18px">
                                <a href="{{ route('admin.edit.product', $product->id ) }}"><i class="far fa-pencil" style="color: #3d393c;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <h1 class="window-title" id="del">Завершенные объявления:</h1>

    <div class="container-fluid " >
        <div class="row" >
            <table class="table table-dark" >
                <thead>
                <tr>
                    <th scope="col" style="font-size: 18px">#</th>
                    <th scope="col" style="font-size: 18px">Название</th>
                    <th scope="col" style="font-size: 18px">Описание</th>
                    <th scope="col" style="font-size: 18px">Цена</th>
                    <th scope="col" style="font-size: 18px">Телефон</th>
                    <th scope="col" style="font-size: 18px">Адрес</th>
                    <th scope="col" style="font-size: 18px">Дата</th>
                    <th scope="col" style="font-size: 18px">Картинка</th>
                    <th scope="col" style="font-size: 18px"><i class="far fa-pencil"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($del_products as $product)
{{--                        @dd($product)--}}
                        <tr>
                            <th scope="row" style="font-size: 14px">{{$product->id}}</th>
                            <td style="font-size: 14px">{{$product->name}}</td>
                            <td style="font-size: 14px; max-width: 400px">
                                <span style="display:block;max-height: 100px; overflow: auto">{{$product->description}}</span></td>
                            <td style="font-size: 14px">{{$product->price}}</td>
                            <td style="font-size: 14px; width:150px">{{$product->phone_number}}</td>
                            <td style="font-size: 14px; max-width: 200px">
                                <span style="display:block;max-height: 100px; overflow: auto">{{$product->location}}</span></td>
                            <td style="font-size: 14px">
                                {{$product->created_at}}
                            </td>
                            <td style="font-size: 14px">
                                <div style="background: url('{{ '/' . $product->img }}') center;
                                         width: 100px;
                                         height: 100px;
                                         background-size: cover;
                                         border-radius: 10px;
                                         border: 1px solid"></div>
                            </td>
                            <td style="font-size: 18px">
                                <a href="{{ route('admin.edit.product', $product->id ) }}"><i class="far fa-pencil" style="color: #ffffff;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
