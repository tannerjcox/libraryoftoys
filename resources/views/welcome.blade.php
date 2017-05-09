@extends('layouts.app')
@section('title')
    {{ config('app.name') }}
@stop
@section('content')
    <div class="col-xs-12">
        <a href="{{ route('browse') }}" class="col-md-6">
            <img src="{{ asset('images/boy-child-fun-beach.jpg') }}" class="col-xs-12 m-b-10"
                 alt="Boy playing at the beach">
        </a>
        <a href="{{ route('browse') }}" class="col-md-6 m-b-10">
            <img src="{{ asset('images/tools.jpg') }}" class="col-xs-12 m-b-10" alt="Tools">
        </a>
    </div>
@stop
