<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    <nav class="navbar-expand-md navbar-light navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            Rental mobil
            </a>
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
                            <form class="d-flex" style="margin-right:20vh;">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('create_mobil') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('create_mobil1').submit();">
                                    {{ __('Create mobil') }}
                                </a>
                                <form id="create_mobil1" action="{{ route('create_mobil') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                                <a class="dropdown-item" href="{{ route('admin_sewa') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('admin_sewa1').submit();">
                                    {{ __('Admin sewa') }}
                                </a>

                                <form id="admin_sewa1" action="{{ route('admin_sewa') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                                    @endif

                                <a class="dropdown-item" href="{{ route('pesanan_waiting') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('waiting1').submit();">
                                    {{ __('Pesanan saya') }}
                                </a>

                                <form id="waiting1" action="{{ route('pesanan_waiting') }}" method="GET" class="d-none">
                                    @csrf
                                </form>

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
</body>
</html>
