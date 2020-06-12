@extends('layouts.app')

@section('title')Подать обявление@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Подать объявление') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Например: Кровать" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>

                                <div class="col-md-6">
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror bfh-selectbox"  data-filter="true" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" placeholder="Например: Очень удобная" class="form-control @error('description') is-invalid @enderror" name="description"></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right ">{{ __('Загрузите изображение') }}</label>

                                <div class="col-md-6">
                                    <div class='uploaded-image' >

                                        <i class="fal fa-cloud-upload"></i>
                                        <img src="" id='uploaded-image' alt="" >
                                        <div class="reupload-image" @error('image') style="border:1px  solid #dc3545" @enderror>
                                            @error('image')  <i class="far fa-exclamation-circle" style="display: flex;justify-content: center;align-items: center ;background: #fff;width: 14px;height: 14px; border-radius: 100% ;font-size: 16px; color:#dc3545; position: absolute; right: 10px; top:10px"></i> @enderror
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="text upload-image " style="cursor: pointer;"> Загрузка изображения  </div>



                                    <input style="display: none"
                                           type="file"
                                           id="image"
                                           name="image"
                                           accept="image/jpeg, image/png">

                                    <small class="form-text text-muted">Это изображение должно быть привлекательным и приятным для пользователей.</small>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Местоположение') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" placeholder="Например: Восточный" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autofocus>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">Местоположение по которому будут приходить покупатели за вашим товаром.</small>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Контактный телефон') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror bfh-phone" data-format="+7 (ddd) ddd-dddd" name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">Будет видно всем пользователям.</small>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Цена') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" placeholder="Например: 12000" class="form-control @error('price') is-invalid @enderror" data-format="*d руб." name="price" value="{{ old('price') }}" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Подать объявление') }}
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

@push('scripts')
    <script>


        window.onload = function () {


            document.querySelector('#uploaded-image').addEventListener('click',function() {
                console.log(1);
                document.querySelector('#image').click();
            });
            document.querySelector('.reupload-image').addEventListener('click',function() {
                console.log(3);
                document.querySelector('#image').click();
            });
            document.querySelector('.fa-cloud-upload').addEventListener('click',function() {
                console.log(3);
                document.querySelector('#image').click();
            });

            document.querySelector('.reupload-image').addEventListener('mousemove', function () {
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-uploaded', 'file-is-reupload' );
                document.querySelector('.reupload-image').style.background = 'rgba(0,0,0,0.5)';

            });
            document.querySelector('.reupload-image').addEventListener('mouseleave', function () {
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-reupload', 'file-is-uploaded' );
                document.querySelector('.reupload-image').style.background = '';

            });
            document.querySelector('.reupload-image').addEventListener('mousemove', function () {
                document.querySelector('.fa-cloud-upload').style.color = '#f0f0f0';
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-uploaded', 'file-is-reupload' );
                document.querySelector('.reupload-image').style.background = 'rgba(0,0,0,0.5)';

            });
            document.querySelector('.reupload-image').addEventListener('mouseleave', function () {
                document.querySelector('.fa-cloud-upload').style.color = '#adadad';
                document.querySelector('.fa-cloud-upload').classList.replace('file-is-reupload', 'file-is-uploaded' );
                document.querySelector('.reupload-image').style.background = '';

            });



            document.querySelector('#image').addEventListener('change', function (event) {
                let reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onload = function(){

                    document.querySelector('.fa-cloud-upload').classList.add('file-is-uploaded');

                    document.querySelector('.uploaded-image').style.border = '0';
                    document.querySelector('.reupload-image').style.border = '1px solid #ced4da';
                    let output = document.querySelector('#uploaded-image');
                    let outputText = document.querySelector('.upload-image');
                    outputText.classList.add('success-upload');
                    outputText.innerHTML = 'Изображение загружено ' + '<i class="far fa-check-circle"></i>';
                    output.src = reader.result;
                };
            });
        };
    </script>
@endpush


