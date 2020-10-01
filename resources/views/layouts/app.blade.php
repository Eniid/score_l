<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Du foot</title>

</head>
<body>
    <div id="app">
        <nav>
            <div>
                <a href="{{ url('/') }}">
                    Home
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
