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
                    <input type="password" id="inputPassword" class="form-control @error('password')is-invalid @enderror" placeholder="Повторите пароль" name="password_confirmation" autocomplete="new-password" >
                    <label for="inputPassword">Повторите пароль</label>
                </div>

                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
            </form>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Регистрация') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="s_name" class="col-md-4 col-form-label text-md-right">{{ __('Фамилия') }}</label>

                                <div class="col-md-6">
                                    <input id="s_name" type="text" class="form-control @error('s_name') is-invalid @enderror" name="s_name" value="{{ old('s_name') }}" autocomplete="s_name" autofocus>


                                    @error('s_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="t_name" class="col-md-4 col-form-label text-md-right">{{ __('Отчество ') }}<small class="text-muted  align-text-top">{{ __('(если имеется) ') }}</small></label>

                                <div class="col-md-6">
                                    <input id="t_name" type="text" class="form-control @error('t_name') is-invalid @enderror" name="t_name" value="{{ old('t_name') }}" autocomplete="t_name" autofocus>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                    <ul class="autosuffix"></ul>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Номер телефона') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number"  type="text" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" value="{{ old('phone_number') }}" name="phone_number">
                                    <small class="form-text text-muted">Для будущей связи с покупателями.</small>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Ваше место жилья') }}</label>

                                <div class="col-md-6">
                                    <input id="location"  type="text" class="form-control @error('location') is-invalid @enderror " value="{{ old('location') }}" name="location">
                                    <small class="form-text text-muted">Для дальнейшего заполнения .</small>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Автобиография') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"  type="text" class="form-control @error('description') is-invalid @enderror " value="{{ old('description') }}" name="description"></textarea>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Зарегистрироваться') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link href="{{ mix('css/email-input.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ mix('js/email-input.js') }}"></script>
@endpush
