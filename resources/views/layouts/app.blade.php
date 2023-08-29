<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,800&display=swap" rel="stylesheet">
        <!-- Vite -->
        @vite(['resources/js/app.js'])
        
    </head>

    <body>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div>
                            <!--logo-->
                            <div>Boolfolio</div>
                            <!--mobile-logo
                            <img src="./img/mobile-logo.png" alt="logo" class="mobile_logo"> -->
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                            {{--  <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a> --}}
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
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

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest

                           {{--  theme dark bootstrap --}}
                            <div class="dropdown position-fixed bottom-10 end-0 mb-3 me-3 bd-mode-toggle">
                                <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (dark)">Theme
                                    <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                                  <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text" style="">
                                  <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                                      <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                                      Light
                                      <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                                    </button>
                                  </li>
                                  <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
                                      <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                                      Dark
                                      <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                                    </button>
                                  </li>
                                  <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                                      <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                                      Auto
                                      <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                                    </button>
                                  </li>
                                </ul>
                              </div>
            
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="d-flex flex-column">
                @yield('content')
            </main>
            
        </div>
    </body>

</html>
