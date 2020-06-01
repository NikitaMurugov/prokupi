@extends('layouts.app')

@section('title')Объявление "{{$product->name}}"@endsection

@section('content')
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Редактирование объявления: №{{ $product->id }} </h3><br>
    </div>
{{--    {{$product}}--}}

    <div class="container-xl container-lg container-md container-sm">

        <div class="">
            <form action="{{ route('update.product') }}"></form>
                <div class="row">
                    <div class="card-body col-8">

                        <div class="form-group">
                            <label for="name" class="small">Название объявления:</label>
                            <input name="name" id="description" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="small"> Загрузка нового изображения:</label>
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/jpeg, image/png">
                            <small class="form-text text-muted">Это изображение должно быть привлекательным и приятным для пользователей.</small>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="card-img-left" style="background: url('{{'/storage/!/thumbs/products/' . $product->img}}') center no-repeat;height: 350px; background-size: cover; border-radius: 10px;  border: 1px  solid #6c757d">
                                <span class="card_old-img">Старое изображение</span>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="description"  class="small">Описание объявления:</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"  cols="30" rows="10">{{$product->description}}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">
                            {{ __('Обновить информацию') }}
                        </button>
                    </div>
                    <div class="card-body col-4">
                        <div class="form-group">
                            <label for="category_id" class="small">{{ __('Категория товара') }}</label>

                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror bfh-selectbox"  data-filter="true" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $product->category_id)  selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="small">Контактный номер: </label>
                            <input type="text" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $product->phone_number }}">

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price" class="small">Цена: </label>
                            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Объявление было подано: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }} в  {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}</small>

                    @if(Auth::id() == $product->user_id)
                        <small class="float-right text-danger font-weight-bold"><i class="far fa-trash-alt"></i> Удалить объявление</small>
                    @endif
                </div>
        </div>
    </div>
@endsection

@push('script')

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
