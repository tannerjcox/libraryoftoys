@extends('layouts.app')
@section('title')
    Page Not Found
@stop
@section('content')
    <div class="center-align container">
        <h3>
            404 - Page Not Found
        </h3>
        <h5>
            Bummer deal! Go head and browse our available items or return to the home page by clicking one of the fancy buttons below!
        </h5>
        <a href="{{ route('browse') }}" class="btn waves-effect waves-light purple">Browse products</a>
        <a href="{{ route('home') }}" class="btn waves-effect waves-light blue darken-4">Home</a>
    </div>
    <div class="image-blurred-edge p-t-md"></div>
@stop