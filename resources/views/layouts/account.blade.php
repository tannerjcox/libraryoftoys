<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <link rel="shortcut icon" href="{{ asset('images/toytrader.ico') }}">

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
<body class="grey lighten-3">
@include('partials.header')
<main>
    <div class="row admin-container">
        @include('partials.sidebar')
        <div class="main-content col s12">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            @include('partials.validation')
            @yield('content')
        </div>
    </div>
</main>
@include('partials.footer')
<!-- Scripts -->
@include('partials.scripts')
@yield('scripts')
</body>
</html>
