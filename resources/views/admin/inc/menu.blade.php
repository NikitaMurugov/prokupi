
@section('menu')
    <div class="menu">
        <div class="menu-left ">
            <a style="text-decoration: none" href="{{ route('admin') }}">
                <div class="logo">
                    <span>прокупи</span><span class='logo-city' style="color: rgba(186,33,27,0.8)">.админ</span>
                </div>
            </a>
        </div>

        <div class="menu-right menu-right-sm" style="display: none"><i class="far fa-bars" style="font-size: 24px;cursor: pointer"></i></div>
        <div class="menu-right menu-right-block menu-right-list">
            <div class="fal fa-times"  style="cursor: pointer; font-size: 24px"></div>

            <a class='btn ' href="{{ route('home') }}">Обратно на страницу  </a>
            @if($path == 'admin/users') @endif
            <a class='btn @if($path == 'admin/users') btn-dark @endif' href="{{ route('admin.users') }}">Пользователи</a>
            <a class='btn @if($path == 'admin/products') btn-dark @endif' href="{{ route('admin.products') }}">Объявления</a>


            <a class='btn ' href="{{ route('logout') }}"
               onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                {{ __('Выйти') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
