<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}?v=<?php echo filemtime(public_path('css/app.css')); ?>">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="{{ asset('/js/app.js') }}?v=<?php echo filemtime(public_path('js/app.js')); ?>"></script>
    @yield('styles')
</head>
<body>
<button id="back-to-top-button" onclick="scrollToTop()">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
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
                        <div class="dropdown">
                            <button class="nav-link nav_link">Producto</button>
                            <div class="dropdown-content">
                                <a href="#">VHL</a>
                                <a href="#">Mesas</a>
                                <a href="#">Escritorios</a>
                                <a href="#">Juntas</a>
                                <div class="dropdownSillones">
                                    <button class="nav-link dropdownSillonesNav_link">Sillones</button>
                                    <div class="dropdownSillonesDropdown-content">
                                        <a href="#">VH</a>
                                        <a href="#">Global</a>
                                        <a href="#">Hospitality</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link nav_link">Servicio</button>
                            <div class="dropdown-content">
                                <a href="#">Diseño especial</a>
                                <a href="#">Cocreación</a>
                                <a href="#">Proyectos Aug</a>
                                <a href="#">Plafones VH</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link nav_link">Historia</button>
                            <div class="dropdown-content">
                                <a href="#">Historia VH</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link nav_link">Proyecto</button>
                            <div class="dropdown-content">
                                <a href="#">Fotos de buenos proyectos</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link nav_link">Showrooms</button>
                            <div class="dropdown-content">
                                <a href="#">Reforma</a>
                                <a href="#">Cancún</a>
                                <a href="#">Pisos y alfombras acabados</a>
                                <a href="#">Master?</a>
                                <a href="#">Lalur</a>
                                <a href="#">Madera</a>
                                <a href="#">Plafones</a>
                                <a href="#">Sintered Stone</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link nav_link">Contáctanos</button>
                            <div class="dropdown-content">
                                <a href="#">VH principal</a>
                                <a href="#">Cancún</a>
                                <a href="#">Queretaro</a>
                                <a href="#">Guadalajara</a>
                                <a href="#">Toluca</a>
                                <a href="#">USA</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('search') }}" method="GET"
                              class="navbar-form navbar-right navbar-form-search" role="search">
                            <div class="search-form-container hdn" id="search-input-container">
                                <div class="search-input-group">
                                    <button type="button" class="order-2 order-md-1 btn btn-default"
                                            id="hide-search-input-container">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i>
                                    </button>
                                    <div class="order-1 order-md-2 form-group">
                                        <label>
                                            <input type="text" class="form-control" name="search"
                                                   placeholder="Search for...">
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

    <main>
        @yield('content')
    </main>

    @yield('script')
</div>
</body>
</html>
