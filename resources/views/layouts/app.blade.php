<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quidditch</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body id="body" style="margin: 1rem 3rem;">
    <div id="app">
        <nav>
            <div>
                <a href="{{ url('/') }}">
                    <h1>Inter-House Quidditch Cup</h1>
                </a>
                @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <a href="#" role="button">
                {{ Auth::user()->name }}
                </a>
                <div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <input type="submit" value="Deconexion">
                        </form>
                </div>
                @endguest
            </div>
        </div>
    </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
