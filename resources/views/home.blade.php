
@extends('layouts.app')

@section('title')Главная страница@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

  <div class="window window__title">
    @guest
      <h1>Добро пожаловать, гость!</h1>
      <p>Если вы хотите выложить свой товар то <a href="/register">зарегистрируйтесь</a>
        или <a href="/login">войдите</a> на наш сайт.</p>

    @else
      <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
    @endguest
  </div>
  <h1 class="window-title">Популярные категории товаров:</h1>
  <div class="window window__sections">
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Бытовая электроника
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Для квартиры и дома
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Хобби и отдых
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Транспорт
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Недвижимость
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Личные вещи
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Животные
      </div>
    </div>
    <div class="section">
      <div class="section-image"></div>
      <div class="section-title">
        Услуги
      </div>
    </div>
  </div>
  <h1 class="window-title">Последние добавленные товары:</h1>
  <div class="window">

  </div>
@endsection
