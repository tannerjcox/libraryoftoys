@extends('layouts.app')
@section('title')
    Browse Products
@stop
@section('content')
    <div class=" row">
        <h1 class="center-align">
            Browse Products
        </h1>
        @if(!$products->count())
            We're sorry, there are no products currently available
        @endif
        @foreach($products as $product)
            <div class="center-align col s6 m3 l2 browse-product">
                <a href="{{ $product->url }}">
                    {!! $product->mainThumbnail !!}<br>
                    {{ $product->name }}<br>
                </a>
                {!! $product->renderRating !!}
                {{ formatMoney($product->renderedPrice) }}<br>
            </div>
        @endforeach
    </div>
@stop
