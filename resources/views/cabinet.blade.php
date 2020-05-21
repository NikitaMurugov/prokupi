@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('content')

        {{-- $user->s_name }}
        {{ $user->name }}
        {{ $user->t_name }}
        {{ $user->email }}
        {{ $user->location }}
        {{ $user->description }}
        {{ $user->phone_number --}}
    <div class="window">
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="header">
                <h2 class="title">Ваш профиль</h2><br><br>
            </div>
            <div class="row">
                <div class="content col-xl-8">
                    <form method="POST" action="{{-- route('update_user') --}}">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Номер  телефона</label>
                                    <input id="phone_number"  type="text" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" value="{{ $user->phone_number }}" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email"  type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"  name="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Адресс</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="{{ $user->location }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Обо мне</label>
                                    <textarea rows="5" class="form-control" placeholder="Обо мне" >{{ $user->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Обновить пользователя</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="content col-4"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
