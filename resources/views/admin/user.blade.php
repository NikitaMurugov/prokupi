@extends('admin.layouts.app')

@section('title')Пользователь "{{ $user->name }}"@endsection

@section('content')
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Редактирование пользователя: №{{ $user->id }} </h3><br>
    </div>
    {{--    {{$product}}--}}

    <div class="container-xl container-lg container-md container-sm">

        <form method="post" action="{{ route('admin.update.user', $user->id) }}" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="s_name">Фамилия</label>
                        <input id="s_name" type="text" class="form-control"  placeholder="{{ __('Фамилия') }}" value="{{ $user->s_name }}" name="s_name">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Имя') }}" value="{{ $user->name }}" name="name">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4  col-sm-12">
                    <div class="form-group">
                        <label for="t_name">Отчество</label>
                        <input id="t_name" type="text" class="form-control" placeholder="{{ __('Отчество') }}" value="{{ $user->t_name }}" name="t_name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="phone_number">Номер  телефона</label>
                        <input id="phone_number"  type="text" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" value="{{ $user->phone_number }}" name="phone_number">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email"  type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"  name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="location">Адресс</label>
                        <input id="location" type="text" class="form-control  @error('location') is-invalid @enderror" placeholder="Адресс" value="{{ $user->location }}"  name="location">
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Обо мне</label>
                        <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Обо мне" name="description">{{ $user->description }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class=" col-md-6 col-12">
                    <button type="submit" class="btn btn-info btn-fill pull-right button-submitform float-left col-md-8 col-12">Обновить пользователя</button>
                </div>
            </div>

        </form>
        <div class="card-footer">
        </div>
    </div>
@endsection
