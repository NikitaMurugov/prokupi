
@push('scripts')
    <script>

    </script>
@endpush

@section('menu')
    <div class="menu">
        <div class="menu-left ">
            <a style="text-decoration: none" href="{{ route('home') }}">
                <div class="logo">
                    <span>прокупи</span><span class='logo-city'>.курган</span>
                </div>
            </a>
            <form action="{{ route('search') }}" class=" form-search">
                @csrf
                <input type="text" class="form-control mr-sm-2 search-input search-input-left" name="search" placeholder="Поиск..." value="{{old('search')}}">
                <i class="fa fa-search"></i>
                <input class="search-input-button" type="submit" style="display: none">
            </form>
        </div>

        <div class="menu-right menu-right-sm" style="display: none"><i class="far fa-bars" style="font-size: 24px;cursor: pointer"></i></div>
        <div class="menu-right menu-right-block menu-right-list">
            <div class="fal fa-times"  style="cursor: pointer; font-size: 24px"></div>
            @guest
                <a class='btn btn-dark' href="{{ route('login') }}">Подать объявление</a>
            @else
                <a class='btn btn-dark' href="{{ route('product.add') }}">Подать объявление</a>
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
                <a class='text-dark user-name-text ' href="{{ route('cabinet') }}">
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


