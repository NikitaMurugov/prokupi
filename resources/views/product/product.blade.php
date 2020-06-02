@extends('layouts.app')

@section('title')Объявление "{{$product->name}}"@endsection

@section('content')

    <div class="window window__title window__title_onsearch">
        <div class="window__title__background"></div>
        <h3>Обьявление  пользователя: {{ $product->user->name }} {{ $product->user->s_name }} </h3><br>
    </div>


    <div class="container-xl container-lg container-md container-sm">

        <div class="card">
            <div class="card-header product-card__title">  <h4> {{$product->name}}</h4> <h4>Цена: {{$product->price}} <span class="">₽</span></h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12" >
                        <div class="">
                            <div class="card-img-left" style="background: url('{{'/' . $product->img}}') center no-repeat;height: 450px; background-size: cover; border-radius: 10px;  border: 1px  solid #6c757d;  margin-bottom: 25px" ></div>

                            <div class="card-title">
                                <h3> {{$product->name}}</h3>
                            </div>
                            <p class="card-text">
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12" >
                        <div class="">
                            <div class="card-text">
                                <span class="text-muted small">Цена товара: </span>
                            </div>
                            <div class="card-text">
                                <input type="text" id="price" class="form-control form-control-plaintext col-md-8 col-sm-12" value="{{ $product->price }} ₽">

                            </div>
                        </div>
                        <br>
                        <div class="">
                            <div class="card-text">
                                <span class="text-muted small">Категория товара: </span>
                            </div>
                            <div class="card-text">
                                <a href="{{route('search', 'category_id='. $product->category_id)}}">{{ $product->category->name }}</a>
                            </div>
                        </div>
                        <br>

                        <div class="">
                            <div class="card-text">
                                <label for="phone_number" class="text-muted small">Контактный телефон:
                                    <i class="fal fa-eye-slash eye" style="cursor: pointer"></i>
                                </label>
                            </div>
                            <div class="card-text">
                                <input type="text"
                                       id="phone_number"
                                       class="form-control form-control-plaintext"
                                       value="{{ $product->phone_number }}">

                            </div>
                        </div>
                        <br>

                        <div>
                            <div class="card-text">
                                <span class="text-muted small">Контактное лицо: </span>
                            </div>
                            <div class="card-text text-primary"><a href="#">{{ $product->user->name }} {{ $product->user->s_name }}</a></div>
                        </div>
                        <br>
                        <div>
                            <div class="card-text">
                                <span class="text-muted small">Местположение: </span>
                            </div>
                            <div class="card-text">
                                {{ $product->location }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <small class="text-muted float-left col-md-6 col-12">Объявление было выложено: {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }} в  {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}</small>
                    @if(Auth::id() == $product->user_id)
                        <a class=" col-md-6 col-12" href="{{ route('product.edit', $product->id) }}"><small class="float-right text-muted"><i class="far fa-pencil"></i> Редактировать объявление</small></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.onload = function () {
            let phoneInput = document.querySelector('#phone_number');
            let eye = document.querySelector('.eye');
            let phoneVal =  phoneInput.value;
            let phoneProtectVal =  phoneVal.split(' ');
            let phProtect = true;
            phoneProtectVal[2] = 'XXX-XXXX';
            phoneProtectVal = phoneProtectVal.join(' ');
            phoneInput.value = phoneProtectVal;
            eye.addEventListener('click', function (ev) {

                if (phProtect)  {
                    eye.classList.replace('fa-eye-slash', 'fa-eye');
                    phoneInput.value = phoneVal;
                    phProtect = false;
                } else {
                    phProtect = true;
                    eye.classList.replace('fa-eye', 'fa-eye-slash');
                    phoneInput.value = phoneProtectVal;
                }
            })

        }
    </script>
@endpush
