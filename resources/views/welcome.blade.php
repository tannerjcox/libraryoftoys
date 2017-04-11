<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    @include('partials.styles')
    <style>
        /* Styles for just the home page*/
    </style>
</head>
<body>
@include('partials.header', ['home' => 1])
<div class="content main-content">
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="links">
        <a href="">Coming Soon</a>
    </div>
    <div>
        <a href="{{ route('home') }}">
            <img width="40%" src="{{ asset('images/boy-child-fun-beach.jpg') }}" alt="Boy playing at the beach">
        </a>
        <a href="{{ route('home') }}">
            <img width="40%" src="{{ asset('images/tools.jpg') }}" alt="Tools">
        </a>
    </div>
</div>
@include('partials.scripts')
</body>
</html>
