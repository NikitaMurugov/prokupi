
@section('menu')
<div class="menu">
    <div class="menu-left ">
        <a style="text-decoration: none" href="{{ route('home') }}">
            <div class="logo">
                <span>прокупи</span><span class='logo-city'>.курган</span>
            </div>
        </a>
        <form action="{{ route('search') }}" class=" form-search">
            <input type="text" class="form-control mr-sm-2 search-input" name="search"  value="{{old('search')}}">
            <i class="fa fa-search"></i>
        </form>
    </div>

  <div class="menu-right">
    @guest
      <a class='btn btn-dark' href="{{ route('login') }}">Подать объявление</a>
    @else
      <a class='btn btn-dark' href="{{ route('product_add') }}">Подать объявление</a>
    @endguest

    @if(request()->path() !== '/')
        <a class='text-dark' href="{{ route('home') }}">Главная  </a>
    @endif
    @guest
          <a class='text-dark' href="{{ route('login') }}">{{ __('Вход') }}</a>
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
