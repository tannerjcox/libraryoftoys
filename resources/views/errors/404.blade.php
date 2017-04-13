@extends('layouts.app')
@section('title')
    Page Not Found
@stop
@section('content')
    <h2 class="text-center">Sorry, the page you are looking for cannot be found</h2>
    <div class="text-center">
        <a href="{{ route('browse') }}" class="btn btn-info">Browse our products</a>
    </div>
@stop