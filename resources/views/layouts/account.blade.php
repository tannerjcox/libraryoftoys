<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    @include('partials.styles')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
@include('partials.header')
<div class="col-md-10 col-md-offset-1">
    @include('partials.sidebar')
    <div class="main-content col-md-9">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
@include('partials.scripts')
</body>
</html>
