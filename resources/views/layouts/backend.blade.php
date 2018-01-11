<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/95d1efc88a.js"></script>
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="bg-grey-lighter min-h-screen h-full font-sans flex">
            @if (Auth::check())
            <div class="bg-white shadow w-64 min-h-screen h-full flex-none ">
                {{ Menu::admin() }}
            </div>
            @endif
            <div class="flex-1 p-8">
                <div class="fixed pin-t pin-r p-8">
                    @include('flash::message')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/backend.js') }}"></script>
</body>
</html>
