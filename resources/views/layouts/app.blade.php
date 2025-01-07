<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Handling Tickets') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <style>
        :root {
            --bg-color: #f0f4f8;
            --text-color: #2c3e50;
            --primary-color: rgb(160, 217, 255);
            --secondary-color: #95a5a6;
        }

        [data-theme="dark"] {
            --bg-color: rgb(47, 60, 73);
            --text-color: #ecf0f1;
            --primary-color: rgb(71, 179, 187);
            --secondary-color: #7f8c8d;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            background-color: var(--primary-color);
        }

        .navbar a {
            color: var(--text-color);
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--text-color);
            margin-left: 15px;
        }

        .theme-toggle:hover {
            color: var(--secondary-color);
        }

        .navbar-brand-logo {
            max-height: 40px;
            margin-right: 10px;
        }
    </style>
</head>
<body data-theme="light">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container d-flex align-items-center">
                <!-- Logo and Application Name -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/applogo.png') }}" alt="Logo" class="navbar-brand-logo">
                    <span>Handling Tickets</span>
                </a>

                <!-- Navbar Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <!-- Dark Mode Toggle -->
                        <li class="nav-item">
                            <i id="theme-icon" class="fas fa-sun theme-toggle" onclick="toggleTheme()"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            body.setAttribute('data-theme', newTheme);

            // Update the icon
            const themeIcon = document.getElementById('theme-icon');
            themeIcon.classList.toggle('fa-sun', newTheme === 'light');
            themeIcon.classList.toggle('fa-moon', newTheme === 'dark');
        }
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @yield('scripts')
</body>
</html>
