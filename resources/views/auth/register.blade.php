@extends('layouts.app')

@section('title')Регистрация@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="form-signin" method="POST" action="{{ route('register') }}" >
                @csrf
                <div class="text-center my-4">
                    <h1 class="h4 mb-3 font-weight-normal">Регистрация</h1>
                    <br>
                </div>

                <div class="form-label-group">
                    <input type="text" id="inputSName" class="form-control @error('s_name')is-invalid @enderror" placeholder="Фамилия" name="s_name"  value="{{ old('s_name') }}" autocomplete="s_name" required autofocus>
                    <label for="inputSName">Фамилия</label>
                    @error('s_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input type="text" id="inputName" class="form-control @error('name')is-invalid @enderror" placeholder="Имя" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
                    <label for="inputName">Имя</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input type="text" id="inputTName" class="form-control @error('t_name')is-invalid @enderror" placeholder="Отчество(если имеется)" name="t_name" value="{{ old('t_name') }}" required autofocus>
                    <label for="inputTName">Отчество(если имеется)</label>
                    @error('t_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr>

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
                    <input type="text" id="inputPhone" class="form-control @error('password')is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" value="{{ old('phone_number') }}" name="phone_number" placeholder="Номер телефона">
                    <label for="inputPhone">Номер телефона</label>
                    <small class="form-text text-muted">Для будущей связи с покупателями.</small>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input type="text" id="inputAdress" class="form-control @error('password')is-invalid @enderror" value="{{ old('location') }}" name="location" placeholder="Адресс">
                    <label for="inputAdress">Адресс</label>
                    <small class="form-text text-muted">В дальнейшем понадобится для заполнения объявлений, пользователям показываться не будет.</small>
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input type="text" id="inputDescription" class="form-control @error('password')is-invalid @enderror" name="description" placeholder="Немного о себе">{{ old('location') }}
                    <label for="inputDescription">Немного о себе</label>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr>
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control @error('password')is-invalid @enderror" placeholder="Пароль" name="password" required>
                    <label for="inputPassword">Пароль</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-label-group">
                    <input type="password" id="inputPasswordСonfirmation" class="form-control @error('password')is-invalid @enderror" placeholder="Повторите пароль" name="password_confirmation" autocomplete="new-password" >
                    <label for="inputPasswordСonfirmation">Повторите пароль</label>
                </div>

                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>

@endsection

@push('styles')
    <link href="{{ mix('css/email-input.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ mix('js/email-input.js') }}"></script>
@endpush
