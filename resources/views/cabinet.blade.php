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

                    let modalHr = document.createElement('hr');
                    modalHr.classList.add('modal-body__hr');

                    let modalText = document.createElement('span');
                    modalText.classList.add('modal-body__text');
                    modalText.innerHTML = 'Вы успешно обновили данные вашей учётной записи';

                    modalBody.appendChild(modalTitle);
                    modalBody.appendChild(modalHr);
                    modalBody.appendChild(modalText);

                    let modalClose = document.createElement('div');
                    modalClose.classList.add('modal-close');
                    let faTimes = document.createElement('i');
                    faTimes.classList.add('fas');
                    faTimes.classList.add('fa-times');
                    faTimes.addEventListener('click',function (ev) {
                        modalInfo.remove();
                    });
                    modalClose.appendChild(faTimes);



                    modalInfo.appendChild(modalBody);
                    modalInfo.appendChild(modalClose);
                    document.body.appendChild(modalInfo);

                    setTimeout(function () {
                        modalInfo.style.opacity = '0';
                        setTimeout(function () {
                            modalInfo.remove();
                        }, 200);
                    }, 1800);
                }
            });
        }
    </script>
@endpush

