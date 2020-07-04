<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: rgb(21, 32, 43); color: #fff" class="pb-5">
    <div id="app">
        <section class="p-4">
            <header class="container-fluid mx-auto d-flex align-items-center justify-content-between">
                <div class="d-flex ml-5">
                    <a href="{{ route('home') }}">
                        <img src="/images/logo.svg" width="60px" height="60px" alt="Twitter">
                    </a>
                    <h1 class="ml-5">
                        Tejas's Twitter
                    </h1>
                </div>
                @auth
                <div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-danger border-0 mb-2">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </header>
        </section>

        {{ $slot }}
    </div>

    <script src="https://unpkg/turbolinks"></script>
</body>

</html>