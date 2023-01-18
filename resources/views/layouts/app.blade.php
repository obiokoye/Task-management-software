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
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>


        <!-- Flot chart -->
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.crosshair.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/flot-charts/jquery.flot.axislabels.js') }}"></script>

         <!-- KNOB JS -->
         <script src="{{ asset('backend/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

         <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>


        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>


        <script src="{{ asset('backend/assets/libs/morris-js/morris.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/morris.init.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
