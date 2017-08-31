@extends('layouts.app')
@section('title')
    {!! $page->title !!}
@stop
@section('content')
    <h1 class="center-align">
        {!! $page->title !!}
    </h1>
    <div class="container">
        {!! $page->page_content !!}
    </div>
@stop