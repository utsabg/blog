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
<style>
    .navbar-brand {
    background-color: unset;
}
</style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            <!--long Welcome Section -->

        <div class=" text-center p-5 rounded text-body-emphasis bg-body-secondary bg-gradient shadow-sm">
            <div class="col-lg-12 p-5">
                <h1 class="display-4 fst-italic">Welcome to The Blog</h1>
                <p class="lead my-3">Share your thoughts and read what others have to say.</p>
            </div>
        </div>

        <main class="py-4">

            <div class="container mb-3">
                <div class="row justify-content-center">
                <!-- User Action Section -->
                <div class="col-md-8 text-center py-3 mb-3 bg-secondary bg-gradient rounded shadow">
                    @guest
                        <!-- Show Register/Login Links if User is Not Logged In -->
                        <h2 class="mb-4">To Create a Post</h2>
                        <a href="{{ route('register') }}" class="btn btn-primary mx-2">Register</a> <span
                            class="mb-4">Or</span>
                        <a href="{{ route('login') }}" class="btn btn-info mx-2">Login</a>
                    @endguest

                    @auth
                        <!--  Welcome Message and Create Post Button if User is Logged In -->
                        <h2 class="mb-4">Welcome, {{ Auth::user()->name }}!</h2>
                        <a href="{{ route('post.create') }}" class="btn btn-success mx-2">Create a New Post</a>
                    @endauth
                </div>

                    @yield('content')
                </div>
            </div>

        </main>
    </div>
</body>

</html>
