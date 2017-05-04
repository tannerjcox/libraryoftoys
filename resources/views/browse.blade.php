@extends('layouts.app')
@section('title')
    Browse Products
@stop
@section('content')
    <div class="col-md-10 col-md-offset-1 text-center">
        <h1>
            Browse Products
        </h1>
        @if(!$products->count())
            We're sorry, there are no products currently available
        @endif
        @foreach($products as $product)
            <div class="text-center">
                <a href="{{ $product->url }}">
                    {!! $product->mainThumbnail !!}<br>
                    {{ $product->name }}<br>
                    {{ formatMoney($product->price) }} / day<br>
                </a>
            </div>
        @endforeach
    </div>
@stop