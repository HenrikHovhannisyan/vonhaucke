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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('./img/logo.png') }}" height="55" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav_link" href="#">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav_link" href="#">PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav_link" href="#">SHOWROOM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav_link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <form class="navbar-form navbar-right navbar-form-search" role="search">
                            <div class="search-form-container hdn" id="search-input-container">
                                <div class="search-input-group">
                                    <button type="button" class="order-2 order-md-1 btn btn-default" id="hide-search-input-container">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i>
                                    </button>
                                    <div class="order-1 order-md-2 form-group">
                                        <label>
                                            <input type="text" class="form-control" placeholder="Search for...">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="nav-link nav_link" id="search-button">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </li>
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
