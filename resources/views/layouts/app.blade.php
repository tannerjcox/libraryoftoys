<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/toytrader2.ico') }}">
    <!-- Styles -->
@include('partials.styles')
@yield('styles')

<!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
    </script>
</head>
<body>
@include('partials.header', ['admin' => 0])
<main>
    <div id="app" class="main-content container-fluid">
        <div class="title m-b-md col-xs-12">
            <a href="/">
                <img src="{{ asset('images/toytrader_logo.png') }}" class="col-sm-4 col-xs-12">
            </a>
        </div>
        @yield('content')
    </div>
</main>
@include('partials.footer')
<!-- Scripts -->
@include('partials.scripts')
@yield('scripts')
</body>
</html>
