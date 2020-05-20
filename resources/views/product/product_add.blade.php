@extends('layouts.app')

@section('title')Подать обявление@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @auth
        <div class="card">
            <div class="card-header">{{ __('Подать объявление') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('product_submit') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название товара') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" placeholder="Например: Кровать" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Категория товара') }}</label>

                        <div class="col-md-6">
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror bfh-selectbox"  data-filter="true" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" >{{$category->name}}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание товара') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" placeholder="Например: Очень удобная" class="form-control @error('description') is-invalid @enderror" name="description"></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Фотография') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                            <small class="form-text text-muted">Это изображение должно быть привлекательным и приятным для пользователей.</small>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Местоположение') }}</label>

                        <div class="col-md-6">
                            <input id="location" type="text" placeholder="Например: Восточный" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autofocus>
                            <small class="form-text text-muted">Местоположение по которому будут приходить покупатели за вашим товаром.</small>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Контактный телефон') }}</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" name="phone_number" value="{{ old('phone_number') }}">
                            <small class="form-text text-muted">Будет видно всем пользователям.</small>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Цена') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="text" placeholder="Например: 12000" class="form-control @error('price') is-invalid @enderror" data-format="*d руб." name="price" value="{{ old('price') }}" autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Подать объявление') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endauth
    </div>
</div>
@endsection
