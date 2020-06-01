@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('content')

    <div class="window">
    </div>
    <div class="container-xl container-lg container-md container-sm">
        <div class="header">
            <h2 class="title">Ваш профиль</h2><br><br>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <form id="update-user" method="POST" action="javascript:updateUser()">
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
                                <label for="location">Адресс</label>
                                <input id="location" type="text" class="form-control" placeholder="Home Address" value="{{ $user->location }}"  name="location">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Обо мне</label>
                                <textarea id="description" rows="5" class="form-control" placeholder="Обо мне" name="description">{{ $user->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right button-submitform">Обновить пользователя</button>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="content col-4"></div>
        </div>
    </div>
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Выложенные вами объявления <span class="text-muted">({{ $user->products_count }})</span>:</h3><br>
    </div>
    <div class="container-xl container-lg container-md container-sm">


        <div class="row">
            @foreach($user->products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-img-top" style="background: url('{{ '/storage/!/thumbs/products/' . $product->img }}') center; height: 200px; background-size: cover; border-radius: 2px"></div>
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

@endsection

@push("scripts")
    <script>

        function updateUser(ev) {
            let data = {};

            $('#update-user').find('input, textearea, select').each(function () {
                data[this.name] = $(this).val();
            });
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
        }
    </script>
@endpush

