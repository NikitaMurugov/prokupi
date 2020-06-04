@extends('admin.layouts.app')

@section('title') Пользователи @endsection

@section('content')

    <div class="my-5 container-xl container-lg container-md container-sm" style="display: flex; justify-content: space-around; align-items: center;">

        <a class="btn btn-dark" href="#nondel">Все пользователи</a>
        <a class="btn btn-dark" href="#del">Удалённые пользователи</a>
    </div>


    <h1 class="window-title"id="nondel">Все пользователи:</h1>

    <div class="container-fluid" >
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 18px">#</th>
                        <th scope="col" style="font-size: 18px">Фамилия</th>
                        <th scope="col" style="font-size: 18px">Имя</th>
                        <th scope="col" style="font-size: 18px">Отчество</th>
                        <th scope="col" style="font-size: 18px">Биография</th>
                        <th scope="col" style="font-size: 18px">Почта</th>
                        <th scope="col" style="font-size: 18px">Телефон</th>
                        <th scope="col" style="font-size: 18px">Адрес</th>
                        <th scope="col" style="font-size: 18px">Дата</th>
                        <th scope="col" style="font-size: 18px"><i class="far fa-trash-alt"></i></th>
                        <th scope="col" style="font-size: 18px"><i class="far fa-pencil"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            @csrf
                            <th scope="col" style="font-size: 14px">
                                {{$user->id}}
                            </th>
                            <td style="font-size: 14px">
                                <span style="display: block">{{$user->s_name}}</span>
                                <div class="form-group" style="display: none">
                                    <input type="text"  class="form-control @error('s_name')is-invalid @enderror" placeholder="Фамилия" name="s_name" value="{{$user->s_name}}" required>

                                    @error('s_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td style="font-size: 14px">
                                <span style="display: block">{{$user->name}}</span>

                            </td>
                            <td style="font-size: 14px">
                                <span style="display: block">{{$user->t_name}}</span>

                            </td>
                            <td style="font-size: 14px; max-width: 400px">
                                <span class="show" style="display:block;max-height: 100px; overflow: auto">{{$user->description}}</span>

                            </td>
                            <td style="font-size: 14px">
                                <span>{{$user->email}}</span>

                            </td>
                            <td style="font-size: 14px; width:150px">
                                <span style="display: block">{{$user->phone_number}}</span>

                            </td>
                            <td style="font-size: 14px">
                                <span class="show" style="display:block;max-height: 100px; overflow: auto;max-width: 300px">{{$user->location}}</span>

                            </td>
                            <td style="font-size: 14px">
                                {{$user->updated_at}}
                            </td>
                            <td style="font-size: 18px" >
                                <form action="{{ route('admin.delete.user', $user->id ) }}"  method="POST">
                                    @csrf
                                    <button type="submit" style="border: 0; background: rgba(0,0,0,0)"><i class="far fa-user-times" style="color: #DD1144;"></i></button>
                                </form>
                            </td>
                            <td style="font-size: 18px">
                                <a href="{{ route('admin.edit.user', $user->id ) }}"><i class="far fa-pencil" style="color: #3d393c;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <h1 class="window-title" id="del">Удалённые пользователи:</h1>

    <div class="container-fluid " >
        <div class="row" >
            <table class="table table-dark" >
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 18px">#</th>
                        <th scope="col" style="font-size: 18px">Фамилия</th>
                        <th scope="col" style="font-size: 18px">Имя</th>
                        <th scope="col" style="font-size: 18px">Отчество</th>
                        <th scope="col" style="font-size: 18px">Биография</th>
                        <th scope="col" style="font-size: 18px">Почта</th>
                        <th scope="col" style="font-size: 18px">Телефон</th>
                        <th scope="col" style="font-size: 18px">Адрес</th>
                        <th scope="col" style="font-size: 18px">Дата</th>
                        <th scope="col" style="font-size: 18px"><i class="far fa-plus"></i></th>
                        <th scope="col" style="font-size: 18px"><i class="far fa-pencil"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($del_users as $user)
                        <tr>
                            <th scope="row" style="font-size: 14px">{{$user->id}}</th>
                            <td style="font-size: 14px">{{$user->s_name}}</td>
                            <td style="font-size: 14px">{{$user->name}}</td>
                            <td style="font-size: 14px">{{$user->t_name}}</td>
                            <td style="font-size: 14px; max-width: 400px">
                                <span style="display:block;max-height: 100px; overflow: auto">{{$user->description}}</span></td>
                            <td style="font-size: 14px">{{$user->email}}</td>
                            <td style="font-size: 14px; width:150px">{{$user->phone_number}}</td>
                            <td>
                                <span style="font-size: 14px;display:block;max-height: 100px; max-width: 300px; overflow: auto">{{$user->location}}</span></td>
                            <td style="font-size: 14px">
                                {{$user->created_at}}
                            </td>
                            <td style="font-size: 18px">
                                <form action="{{ route('admin.recover.user', $user->id)}}" method="post">
                                    @csrf
                                    <button type="submit" style="border: 0; background: rgba(0,0,0,0)"><i class="far fa-user-plus" style="color: #fff;"></i></button>
                                </form>
                            </td>
                            <td style="font-size: 18px">
                                <a href="{{ route('admin.edit.user', $user->id ) }}"><i class="far fa-pencil" style="color: #fff;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // function updateProduct() {
        //     let data = {};
        //     let inputs = {};
        //     let errors = {};
        //
        //     $('#update-user').find('input, textearea').each(function () {
        //         inputs[this.name] = $(this);
        //         data[this.name] = $(this).val();
        //     });
        //
        //     if (data['name'] === '') {
        //         errors.name = 'Поле "имя" является обязательным';
        //     }
        //     if (data['s_name'] === '') {
        //         errors.s_name = 'Поле "фамилия" является обязательным';
        //     }
        //     if (data['email'] === '') {
        //         errors.email = 'Поле "почта" является обязательным';
        //     }
        //     if (data['phone_number'] === '') {
        //         errors.phone_number = 'Поле "номер телефона" является обязательным';
        //     }
        //     if (data['phone_number'].split('').length !== 17) {
        //         errors.phone_number = 'Поле "номер телефона" не полностью  заполнено';
        //     }
        //     if (data['location'] === '') {
        //         errors.location = 'Поле "адресс" является обязательным';
        //     }
        //
        //     if (Object.keys(errors).length === 0) {
        //
        //         for(let input in inputs) {
        //             if (inputs[input][0].classList.item('is-invalid')) {
        //                 inputs[input][0].classList.remove('is-invalid');
        //             }
        //             let messageBlock = inputs[input][0].parentNode.querySelector("." + input + "-invalid-feedback");
        //             if (messageBlock) {
        //                 messageBlock.style.display = 'none';
        //                 messageBlock.childNodes[1].innerText = '';
        //             }
        //         }
        //         $.ajax({
        //             url: '/update/user',
        //             type: 'post',
        //             data: data,
        //             success: function success(result) {
        //
        //                 document.querySelector('.user-name-text').innerHTML = $('#name').val();
        //
        //
        //                 let modalInfo = document.createElement('div');
        //                 modalInfo.classList.add('modal-window');
        //                 modalInfo.style.opacity = '0';
        //                 modalInfo.style.opacity = '1';
        //
        //                 let modalBody = document.createElement('div');
        //                 modalBody.classList.add('modal-body');
        //                 modalBody.classList.add('modal-info');
        //
        //                 let modalTitle = document.createElement('h3');
        //                 modalTitle.classList.add('modal-body__title');
        //                 modalTitle.innerHTML = 'Успех!';
        //
        //                 let modalClose = document.createElement('div');
        //                 modalClose.classList.add('modal-close');
        //                 let faTimes = document.createElement('i');
        //                 faTimes.classList.add('fal');
        //                 faTimes.classList.add('fa-times');
        //                 faTimes.addEventListener('click',function (ev) {
        //                     modalInfo.remove();
        //                 });
        //                 modalClose.appendChild(faTimes);
        //                 let modalHr = document.createElement('hr');
        //                 modalHr.classList.add('modal-body__hr');
        //
        //                 let modalText = document.createElement('span');
        //                 modalText.classList.add('modal-body__text');
        //                 modalText.innerHTML = 'Вы успешно обновили данные вашей учётной записи';
        //
        //                 modalBody.appendChild(modalClose);
        //                 modalBody.appendChild(modalTitle);
        //                 modalBody.appendChild(modalHr);
        //                 modalBody.appendChild(modalText);
        //
        //                 modalInfo.appendChild(modalBody);
        //                 document.body.appendChild(modalInfo);
        //
        //                 setTimeout(function () {
        //                     modalInfo.style.opacity = '0';
        //                     setTimeout(function () {
        //                         modalInfo.remove();
        //                     }, 200);
        //                 }, 2500);
        //             }
        //         });
        //     } else {
        //         for(let input in inputs) {
        //             if (inputs[input][0].classList.item('is-invalid')) {
        //                 inputs[input][0].classList.remove('is-invalid');
        //             }
        //             let messageBlock = inputs[input][0].parentNode.querySelector("." + input + "-invalid-feedback");
        //             if (messageBlock) {
        //                 messageBlock.style.display = 'none';
        //                 messageBlock.childNodes[1].innerText = '';
        //             }
        //         }
        //         for(let error in errors) {
        //             inputs[error][0].classList.add('is-invalid');
        //             let messageBlock = inputs[error][0].parentNode.querySelector("." + error + "-invalid-feedback");
        //             messageBlock.style.display = 'block';
        //             messageBlock.childNodes[1].innerText = errors[error];
        //         }
        //     }
        //
        // }
        // window.onload = function () {
        //     let pencils = document.querySelectorAll('.fa-pencil');
        //     pencils.forEach(function (pencil) {
        //         pencil.addEventListener('click', function () {
        //             let inputs = {};
        //             let input = [];
        //
        //             $(this.parentNode.parentNode).find('input, textarea').each(function () {
        //                 inputs[this.name] = $(this);
        //             });
        //             console.log(inputs);
        //             for (input in inputs)  {
        //                 console.log(input.parentNode);
        //             }
        //
        //             inputs = {};
        //         })
        //     })
        // }
    </script>
@endpush
