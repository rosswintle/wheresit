<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WheresIt') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="container">
        <nav class="row">
            <a class="logo-link" href="{{ url('/') }}">
                {{ config('app.name', 'WheresIt') }}
            </a>

            <ul class="navbar-nav">

                    @auth
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Vendor Login</a>
                        </li>
                    @endauth

            </ul>
        </nav>
    </header>

    <div class="alerts container">
        @if (session('status'))
            <div class="alert success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <main>
        @yield('content')
    </main>
</body>
</html>
