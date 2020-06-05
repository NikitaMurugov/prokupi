<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Администрирование - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/popper.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/bootstrap-formhelpers.min.js') }}" defer></script>
    <script>
        window.onload = function () {

            if (window.innerWidth <= 1200)  {
                document.querySelector('.menu-right-sm').style.display = "block";
                document.querySelector('.menu-right-block').style.display = "none";
                document.querySelector('.fa-times').style.display = "block";
                document.querySelector('.menu-right-block').classList.add('menu-right-list');
                document.querySelector('.menu-right-block').classList.remove('menu-right');
            } else {
                document.querySelector('.menu-right-sm').style.display = "none";
                document.querySelector('.fa-times').style.display = "none";
                document.querySelector('.menu-right-block').style.display = "block";
                document.querySelector('.menu-right-block').classList.remove('menu-right-list');
                document.querySelector('.menu-right-block').classList.add('menu-right');
            }

            document.querySelector('.fa-times').addEventListener('click', function () {

                if (document.querySelector('.menu-right-block').classList.contains('show')) {
                    document.querySelector('.menu-right-block').style.display = "none";
                    document.querySelector('.menu-right-block').classList.remove('show');
                } else {
                    document.querySelector('.menu-right-block').style.display = "flex";
                    document.querySelector('.menu-right-block').classList.add('show');
                }
            });

            document.querySelector('.fa-bars').addEventListener('click', function () {
                console.log('clax');
                if (!document.querySelector('.menu-right-block').classList.contains('show')) {
                    document.querySelector('.menu-right-block').style.display = "flex";
                    document.querySelector('.menu-right-block').classList.add('show');
                } else {
                    document.querySelector('.menu-right-block').style.display = "none";
                    document.querySelector('.menu-right-block').classList.remove('show');
                }

            });

            window.addEventListener('resize', function() {
                if (window.innerWidth <= 1200)  {
                    document.querySelector('.menu-right-sm').style.display = "block";
                    document.querySelector('.menu-right-block').style.display = "none";
                    document.querySelector('.fa-times').style.display = "block";
                    document.querySelector('.menu-right-block').classList.add('menu-right-list');
                    document.querySelector('.menu-right-block').classList.remove('menu-right');
                } else {
                    document.querySelector('.menu-right-sm').style.display = "none";
                    document.querySelector('.fa-times').style.display = "none";
                    document.querySelector('.menu-right-block').style.display = "block";
                    document.querySelector('.menu-right-block').classList.remove('menu-right-list');
                    document.querySelector('.menu-right-block').classList.add('menu-right');
                }

            });
        }

    </script>
    @stack('scripts')

<!-- Icons -->
    {{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">--}}
    <link href="{{ mix('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Literata:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ mix('css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">
    <link href="{{ mix('css/all.css') }}" rel="stylesheet">
    <link href="{{ mix('css/media.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

@include('admin.inc.menu')

@yield('content')

{{--@include('inc.footer')--}}

</body>
</html>
