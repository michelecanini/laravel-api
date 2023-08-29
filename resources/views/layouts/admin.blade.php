<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])

    </head>

    <body>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-sticky-top">
                <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 10fr 1fr;">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div>
                            <!--logo-->
                            <div>Boolfolio</div>
                            <!--mobile-logo
                            <img src="./img/mobile-logo.png" alt="logo" class="mobile_logo"> -->
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <div class="d-flex align-items-center">
                        <form class="w-100 me-3"  role="search">
                        <i class="fa-solid fa-magnifying-glass my-icon"></i>
                            <input  type="search" class="form-control bg-light p_left" placeholder="Prova a cercare un Progetto" aria-label="Search">
                        </form>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul> --}}

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
                        </ul>
                    </div>
                </div>
            </nav>

                <!--START MAIN-->
                <main >

                    <!--START SIDEBAR LEFT-->
                    <div class="sidebar">
                        <div class="top_sidebar">
                        <section>                  
                            <!-- menu-top-sidebar-->
                            <ul>
                                <li><a href="{{ url('admin') }}"><i class="fa-solid fa-house" style="color: #ffffff;"></i><span>Dashboard</span></a></li>
                                <li><a href="{{ route('admin.projects.index') }}"><i class="fa fa-rocket" style="color: #ffffff;"></i><span>Projects</span></a></li>
                                <li><a href="{{ route('admin.types.index') }}"><i class="fa-solid fa-diagram-project" style="color: #ffffff;"></i><span>Types</span></a></li>
                                <li><a href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-laptop-code" style="color: #ffffff;"></i><span>Tech</span></a></li>
                                <li><a href="{{ url('profile') }}"><i class="fa-solid fa-user" style="color: #ffffff;"></i><span>Profile</span></a></li>
                            </ul> 
                            
                        </section>
                        </div>
                            <!--button bottom sidebar-->
                        <div class="bot_sidebar">
                        <section>
                            <!-- admin-->
                            <div>
                                <a href="#"><i class="fa-solid fa-gear" style="color: #ffffff;"></i><span>Admin</span></a>
                            </div>
                        </section>
                        </div>
                    </div>
                    <!--END SIDEBAR LEFT-->
                    
                    @yield('content')
            </main>
            <!--END MAIN-->
            
        </div>
    </body>

</html>