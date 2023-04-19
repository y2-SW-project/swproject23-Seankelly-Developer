<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eat-Up') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    EatUp
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
                        <!-- Search Bar -->
                        <form action="{{ route('search') }}" method="GET" class="d-flex">
                            <input class="form-control me-2" type="search" name="q" placeholder="Search restaurants" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
          <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">About EatUp</h5>
      
              <p>
                EatUp is a platform that connects foodies with their favorite restaurants. With a focus on making the dining experience as smooth and enjoyable as possible, we aim to provide our users with the best possible service.
              </p>
            </div>
      
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Links</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-dark">Privacy Policy</a>
                </li>
                <li>
                  <a href="#!" class="text-dark">Terms of Service</a>
                </li>
                <li>
                  <a href="#!" class="text-dark">Contact Us</a>
                </li>
              </ul>
            </div>
      
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Connect With Us</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-dark"><i class="bi bi-facebook"></i> Facebook</a>
                </li>
                <li>
                  <a href="#!" class="text-dark"><i class="bi bi-twitter"></i> Twitter</a>
                </li>
                <li>
                  <a href="#!" class="text-dark"><i class="bi bi-instagram"></i> Instagram</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          &copy; {{ date('Y') }} EatUp. All rights reserved.
        </div>
      </footer>
      
</body>
</html>
