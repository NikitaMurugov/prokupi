@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('content')

    <div class="window">
    </div>
    <div class="container-xl container-lg container-md container-sm">
        <div class="header">
            <h2 class="title">Ваш профиль</h2><br><br>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8">
                <form id="update-user" method="POST" action="javascript:updateUser()">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="s_name">Фамилия</label>
                                <input id="s_name" type="text" class="form-control"  placeholder="{{ __('Фамилия') }}" value="{{ $user->s_name }}" name="s_name">
                                <span style="display: none" class="invalid-feedback s_name-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Имя') }}" value="{{ $user->name }}" name="name">
                                <span style="display: none" class="invalid-feedback name-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
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
                                <span style="display: none" class="invalid-feedback phone_number-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email"  type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"  name="email">
                                <span style="display: none" class="invalid-feedback email-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="location">Адресс</label>
                                <input id="location" type="text" class="form-control" placeholder="Адресс" value="{{ $user->location }}"  name="location">
                                <span style="display: none" class="invalid-feedback location-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Обо мне</label>
                                <textarea id="description" rows="5" class="form-control" placeholder="Обо мне" name="description">{{ $user->description }}</textarea>
                                <span style="display: none" class="invalid-feedback description-invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 col-sm-12">
                            <button type="submit" class="btn btn-info btn-fill pull-right button-submitform float-left">Обновить пользователя</button>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div type="submit" class="btn btn-danger btn-fill button-deleteuser float-right">Отключить пользователя</div>
                        </div>
                    </div>

                </form>
                <form style="display: none" action="{{ route('delete.user') }}" method="post" id="delete-user">
                    @csrf
                </form>
            </div>
            <div class="content col-4">

            </div>
        </div>
    </div>
    @if($user->products_count !== 0)
        <div class="window window__title window__title_onsearch">
            <div class="window__title__background"></div>
            <h3>Выложенные вами объявления <span class="text-muted">({{ $user->products_count }})</span>:</h3><br>
        </div>

        <div class="container-xl container-lg container-md container-sm">
            <div class="row">
                @foreach($user->products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card ">
                            <div class="card-img-top" style="background: url('{{ '/' . $product->img }}') center; height: 200px; ">
                                <small class="text-center id-product" style=""> объявление №{{$product->id}}</small></div>
                            <div class="card-body">
                                <h5 class="card-title ">{{ $product->name }}</h5>
                                <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                                <p class="card-text text-black-50" style="height: 100px; overflow: hidden">{{ $product->description }}</p>
                            </div>
                            <div class="card-body">

                                <form method="get" action="{{ route('search') }}">
                                    @csrf
                                    <a href="{{asset('product/edit/' . $product->id)}}" class="text-muted">Редактировать <i class="fal fa-pencil-alt text-muted" style="width: 25px;height: 25px; color: #000;"></i></a>
                                    <br>
                                    <input type="text" name="category_id" value="{{ $product->category->id }}" style="display: none" disabled>
                                    <input type="submit" class="btn btn-sm btn-outline-info" value="{{ $product->category->name }}">
                                </form>

                            </div>
                            <div class="card-footer">
                                <small class="text-muted"> Дата: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if(!$del_products->isEmpty())
        <div class="window window__title window__title_dark window__title_onsearch">
            <div class="window__title__background_dark"></div>

            <h3>
                Завершенные объявления:
            </h3><br>
        </div>
        <div class="container-xl container-lg container-md container-sm">
            <div class="row">
                @foreach($del_products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card ">
                            <div class="card-img-top" style="background: url('{{ '/' . $product->img }}') center; height: 200px; background-size: cover; border-radius: 2px">
                                <small class="text-center id-product" > объявление №{{$product->id}}</small>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">{{ $product->name }}</h5>
                                <h5 class="card-subtitle text-primary">{{ $product->price }} руб.</h5>
                                <p class="card-text text-black-50" style="height: 100px; overflow: hidden">{{ $product->description }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted"> Завершено: {{ \Carbon\Carbon::parse($product->deleted_at)->format('d.m.Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

@push("scripts")
    <script>

        function updateUser(ev) {
            let data = {};
            let inputs = {};
            let errors = {};

            $('#update-user').find('input, textearea').each(function () {
                inputs[this.name] = $(this);
                data[this.name] = $(this).val();
            });

            if (data['name'] === '') {
                errors.name = 'Поле "имя" является обязательным';
            }
            if (data['s_name'] === '') {
                errors.s_name = 'Поле "фамилия" является обязательным';
            }
            if (data['email'] === '') {
                errors.email = 'Поле "почта" является обязательным';
            }
            if (data['phone_number'] === '') {
                errors.phone_number = 'Поле "номер телефона" является обязательным';
            }
            if (data['phone_number'].split('').length !== 17) {
                errors.phone_number = 'Поле "номер телефона" не полностью  заполнено';
            }
            if (data['location'] === '') {
                errors.location = 'Поле "адресс" является обязательным';
            }

            if (Object.keys(errors).length === 0) {

                for(let input in inputs) {
                    if (inputs[input][0].classList.item('is-invalid')) {
                        inputs[input][0].classList.remove('is-invalid');
                    }
                    let messageBlock = inputs[input][0].parentNode.querySelector("." + input + "-invalid-feedback");
                    if (messageBlock) {
                        messageBlock.style.display = 'none';
                        messageBlock.childNodes[1].innerText = '';
                    }
                }
                $.ajax({
                    url: '/update/user',
                    type: 'post',
                    data: data,
                    success: function success(result) {

                        document.querySelector('.user-name-text').innerHTML = $('#name').val();


                        let modalInfo = document.createElement('div');
                        modalInfo.classList.add('modal-window');
                        modalInfo.style.opacity = '0';
                        modalInfo.style.opacity = '1';

                        let modalBody = document.createElement('div');
                        modalBody.classList.add('modal-body');
                        modalBody.classList.add('modal-info');

                        let modalTitle = document.createElement('h3');
                        modalTitle.classList.add('modal-body__title');
                        modalTitle.innerHTML = 'Успех!';

                        let modalClose = document.createElement('div');
                        modalClose.classList.add('modal-close');
                        let faTimes = document.createElement('i');
                        faTimes.classList.add('fal');
                        faTimes.classList.add('fa-times');
                        faTimes.addEventListener('click',function (ev) {
                            modalInfo.remove();
                        });
                        modalClose.appendChild(faTimes);
                        let modalHr = document.createElement('hr');
                        modalHr.classList.add('modal-body__hr');

                        let modalText = document.createElement('span');
                        modalText.classList.add('modal-body__text');
                        modalText.innerHTML = 'Вы успешно обновили данные вашей учётной записи';

                        modalBody.appendChild(modalClose);
                        modalBody.appendChild(modalTitle);
                        modalBody.appendChild(modalHr);
                        modalBody.appendChild(modalText);

                        modalInfo.appendChild(modalBody);
                        document.body.appendChild(modalInfo);

                        setTimeout(function () {
                            modalInfo.style.opacity = '0';
                            setTimeout(function () {
                                modalInfo.remove();
                            }, 200);
                        }, 2500);
                    }
                });
            } else {
                for(let input in inputs) {
                    if (inputs[input][0].classList.item('is-invalid')) {
                        inputs[input][0].classList.remove('is-invalid');
                    }
                    let messageBlock = inputs[input][0].parentNode.querySelector("." + input + "-invalid-feedback");
                    if (messageBlock) {
                        messageBlock.style.display = 'none';
                        messageBlock.childNodes[1].innerText = '';
                    }
                }
                for(let error in errors) {
                    inputs[error][0].classList.add('is-invalid');
                    let messageBlock = inputs[error][0].parentNode.querySelector("." + error + "-invalid-feedback");
                    messageBlock.style.display = 'block';
                    messageBlock.childNodes[1].innerText = errors[error];
                }
            }
        }

        window.onload = function  () {
            let deleteButton = document.querySelector('.button-deleteuser');

            deleteButton.addEventListener('click', function (ev) {

                let modalInfo = document.createElement('div');
                modalInfo.classList.add('modal-window');
                modalInfo.style.opacity = '0';
                modalInfo.style.opacity = '1';

                let modalBody = document.createElement('div');
                modalBody.classList.add('modal-body');
                modalBody.classList.add('modal-danger');
                let blockTitle = document.createElement('div');
                let modalTitle = document.createElement('h3');
                modalTitle.classList.add('modal-body__title');
                modalTitle.innerHTML = 'Внимание!';

                let modalClose = document.createElement('div');
                modalClose.classList.add('modal-close');
                let faTimes = document.createElement('i');
                faTimes.classList.add('fal');
                faTimes.classList.add('fa-times');
                faTimes.addEventListener('click',function (ev) {
                    modalInfo.remove();
                });

                modalClose.appendChild(faTimes);
                let modalHr = document.createElement('hr');
                modalHr.classList.add('modal-body__hr');

                blockTitle.appendChild(modalTitle);
                blockTitle.appendChild(modalHr);

                let modalText = document.createElement('span');
                modalText.classList.add('modal-body__text');
                modalText.innerHTML = 'Вы уверены что хотите удалить пользователя?';

                let modalSubmit = document.createElement('div');
                modalSubmit.classList.add('modal-body__button');
                modalSubmit.classList.add('btn');
                modalSubmit.classList.add('btn-danger');
                modalSubmit.innerHTML = 'Отключить пользователя';
                modalSubmit.addEventListener('click', function () {
                    document.querySelector("#delete-user").submit();
                });
                modalBody.appendChild(modalClose);
                modalBody.appendChild(blockTitle);
                modalBody.appendChild(modalText);
                modalBody.appendChild(modalSubmit);


                modalInfo.appendChild(modalBody);
                document.body.appendChild(modalInfo);
            });

        };
    </script>
@endpush

