@extends('layouts.app')
@section('title')
    {!! $page->title !!}
@stop
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center">
            {!! $page->title !!}
        </h1>
        {!! $page->page_content !!}
    </div>
@stop