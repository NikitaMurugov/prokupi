@extends('layouts.app')

@section('title')Вход@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="window"></div>
                <form class="form-signin" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="text-center my-4">
                        <h1 class="h4 mb-3 font-weight-normal">Вход на сайт</h1>
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


            <div class="window"></div>
        </div>
    </div>
@endsection
