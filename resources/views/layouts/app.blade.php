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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
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
                        <!-- Categories Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin/categories*') ? 'active' : '' }}"
                                id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/categories') ? 'active' : '' }}"
                                        href="{{ route('categories.index') }}">Index</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/categories/create') ? 'active' : '' }}"
                                        href="{{ route('categories.create') }}">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Districts Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin/districts*') ? 'active' : '' }}"
                                id="districtsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Districts
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="districtsDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/districts') ? 'active' : '' }}"
                                        href="{{ route('districts.index') }}">Index</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/districts/create') ? 'active' : '' }}"
                                        href="{{ route('districts.create') }}">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Reports Link -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/reports') ? 'active' : '' }}"
                                href="{{ route('reports.index') }}">Reports</a>
                        </li>

                        <!-- Posts Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin/posts*') ? 'active' : '' }}"
                                id="postsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Posts
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="postsDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/posts') ? 'active' : '' }}"
                                        href="{{ route('posts.index') }}">Index</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/posts/create') ? 'active' : '' }}"
                                        href="{{ route('posts.create') }}">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Media Link -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/media') ? 'active' : '' }}"
                                href="{{ route('media.index') }}">Media</a>
                        </li>

                        <!-- Donations Link -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/donations') ? 'active' : '' }}"
                                href="{{ route('donations.index') }}">Donations</a>
                        </li>

                        <!-- Settings Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('admin/settings*') ? 'active' : '' }}"
                                id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Settings
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/settings') ? 'active' : '' }}"
                                        href="{{ route('settings.index') }}">Index</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('admin/settings/create') ? 'active' : '' }}"
                                        href="{{ route('settings.create') }}">Add</a>
                                </li>
                            </ul>
                        </li>
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="container py-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>
