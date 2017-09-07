@extends('layouts.app')
@section('title')
    Page Not Found
@stop
@section('content')
    <div class="center-align container">
        <h2>{{ $exception->getMessage() }}</h2>
        <h5>
            But only for a bit! Check back in {{ $exception->retryAfter / 60 . ' ' . str_plural('minute', ($exception->retryAfter / 60)) }}
        </h5>
    </div>
    <div class="image-blurred-edge page-503 p-t-md"></div>
@stop