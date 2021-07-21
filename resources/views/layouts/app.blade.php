<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <h6 class="">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">Авторизация</a>--}}
{{--                                </h6>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <h6 class="">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>--}}
{{--                                </h6>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                        @endguest--}}
{{--                </div>--}}
{{--        </nav>--}}
        <div class="bg-white shadow-sm row">
            <ul class="nav text-size mb-2 mt-2 pl-3 justify-content-center">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-link link-dark">
                            <a class="" href="{{ route('login') }}">Авторизация</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-link link-dark">
                            <a class="" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
                    <div class="p-2">
                        <a class="mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Профиль
                        </a>

                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выйти
                        </a>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>


        <main class="py-4">
            @if(isset(Auth::user()->role) && Auth::user()->role == 'siteAdmin')
                header('Location: /admin-site');
            @endif

            @if(isset(Auth::user()->role) && Auth::user()->role == 'PMCAdmin')
                    header('Location: /pmc-admin');
            @endif

                @if(isset(Auth::user()->role) && Auth::user()->role == 'PMKAdmin')
                    header('Location: /pmk-admin');
                @endif

{{--                @if(isset(Auth::user()->role) && Auth::user()->role == 'client')--}}
{{--                    header('Location: /home');--}}
{{--                @endif--}}

            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
