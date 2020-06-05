@extends('admin.layouts.app')

@section('title')Объявление "{{ $product->name }}"@endsection

@section('content')
    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Редактирование объявления: №{{ $product->id }} </h3><br>
    </div>
    {{--    {{$product}}--}}

    <div class="container-xl container-lg container-md container-sm">

        <form method="post" action="{{ route('admin.update.product', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="card-body col-md-8 col-sm-12">

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

                    </div>


                    <div class="form-group">

                        <label for="image" class="small upload-image"  id=""> Загрузка нового изображения:</label>

                        <div class="file-preview-image col-md-12 col-sm-12 card-img-left" >

                            <i class="fal fa-cloud-upload file-is-uploaded"></i>
                            <img id="preview-uploaded-image" src="{{'/' . $product->img}}"  style="max-height: 350px" alt="Картинка товара">
                            <div class="file-preview-image-reupload"></div>
                            <span class="card_old-img">Старое изображение</span>
                        </div>
                        <input style="display: none"
                               id="image"
                               type="file"
                               class="form-control-file "
                               name="image"
                               accept="image/jpeg, image/png">
                        {{--                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/jpeg, image/png">--}}
                        <small class="form-text text-muted">Это изображение должно быть привлекательным и приятным для пользователей.</small>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

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

                    <div class="form-group">
                        <label for="location"  class="small">Местоположение:</label>
                        <input name="location" id="location" class="form-control @error('description') is-invalid @enderror"  value="{{$product->location}}">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                </div>
                <div class="card-body col-md-4 col-sm-12">
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
                        <input type="text" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" name="phone_number" value="{{ $product->phone_number }}">

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
                <div class="card-body col-12">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Обновить информацию') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="card-footer">
            <small class="text-muted">Объявление было подано: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }} в  {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}</small>

        </div>
    </div>
@endsection

@push('scripts')

    <script>
        window.onload = function  () {
            let deleteButton = document.querySelector('.delete-product-button');

            document.querySelector('#preview-uploaded-image').addEventListener('click',function() {
                document.querySelector('#image').click();
            });
            document.querySelector('.file-preview-image-reupload').addEventListener('click',function() {
                document.querySelector('#image').click();
            });
            document.querySelector('.fa-cloud-upload').addEventListener('click',function() {
                document.querySelector('#image').click();
            });

            document.querySelector('.fa-cloud-upload').addEventListener('mousemove', function () {
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-uploaded', 'file-is-reupload' );
                document.querySelector('.file-preview-image-reupload').style.background = 'rgba(0,0,0,0.5)';

            });
            document.querySelector('.fa-cloud-upload').addEventListener('mouseleave', function () {
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-reupload', 'file-is-uploaded' );
                document.querySelector('.file-preview-image-reupload').style.background = '';

            });
            document.querySelector('.file-preview-image-reupload').addEventListener('mousemove', function () {
                document.querySelector('.fa-cloud-upload').style.color = '#f0f0f0';
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-uploaded', 'file-is-reupload' );
                document.querySelector('.file-preview-image-reupload').style.background = 'rgba(0,0,0,0.5)';

            });
            document.querySelector('.file-preview-image-reupload').addEventListener('mouseleave', function () {
                document.querySelector('.fa-cloud-upload').style.color = '#adadad';
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-reupload', 'file-is-uploaded' );
                document.querySelector('.file-preview-image-reupload').style.background = '';

            });



            document.querySelector('#image').addEventListener('change', function (event) {
                let reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onload = function(){

                    document.querySelector('.card_old-img').innerHTML = 'Новое изображение';

                    let output = document.querySelector('#preview-uploaded-image');
                    let outputText = document.querySelector('.upload-image');
                    outputText.innerHTML += ' <i class="far fa-check-circle"></i>';
                    output.src = reader.result;
                };
            });

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
                modalText.innerHTML = 'Вы уверены  в том что хотите закрыть объявление?';

                let modalSubmit = document.createElement('div');
                modalSubmit.classList.add('modal-body__button');
                modalSubmit.classList.add('btn');
                modalSubmit.classList.add('btn-danger');
                modalSubmit.innerHTML = 'Закрыть объявление';
                modalSubmit.addEventListener('click', function () {
                    let formDeleteButton = document.querySelector('#delete-product');
                    formDeleteButton.click();
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
