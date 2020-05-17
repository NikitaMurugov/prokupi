
@section('menu')
<div class="menu">
  <a href="/">
    <div class="menu-left logo">
      <span>прокупи</span><span class='logo-city'>.курган</span>
    </div>
  </a>

  <div class="menu-right">
    @guest
      <a class='btn btn-dark' href="{{ route('login') }}">Подать объявление</a>
    @else
      <a class='btn btn-dark' href="{{ route('product_add') }}">Подать объявление</a>
    @endguest

    <a class='text-dark' href="{{ route('home') }}">Главная</a>
    @guest
          <a class='text-dark' href="{{ route('login') }}">{{ __('Логин') }}</a>
        @if (Route::has('register'))
          <a class='text-dark' href="{{ route('register') }}">{{ __('Регистрация') }}</a>
        @endif
    @else
      <a class='text-dark' href="{{ route('cabinet') }}">
          {{ Auth::user()->name }}
      </a>

      <a class='text-dark' href="{{ route('logout') }}"
         onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
          {{ __('Выйти') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @endguest
  </div>
</div>
