<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/toytrader2.ico') }}">
    <!-- Styles -->
    @include('partials.styles')
    <style>
        /* Styles for just the home page*/
    </style>
</head>
<body>
@include('partials.header', ['admin' => 0])
<div class="content main-content">
    <div class="title m-b-md col-sm-10 col-sm-offset-1">
        <img src="{{ asset('images/toytrader_logo.png') }}" class="col-md-4 col-xs-12">
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <a href="{{ route('browse') }}" class="col-md-6">
                <img src="{{ asset('images/boy-child-fun-beach.jpg') }}" class="col-xs-12 m-b-10" alt="Boy playing at the beach">
            </a>
            <a href="{{ route('browse') }}" class="col-md-6 m-b-10">
                <img src="{{ asset('images/tools.jpg') }}" class="col-xs-12 m-b-10" alt="Tools">
            </a>
        </div>
    </div>
</div>
@include('partials.footer')
@include('partials.scripts')
</body>
</html>
