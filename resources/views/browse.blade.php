@extends('layouts.app')
@section('title')
    Browse Products
@stop
@section('content')
    <div class="text-center">
        <h1>
            Browse Products
        </h1>
        @if(!$products->count())
            We're sorry, there are no products currently available
        @endif
        @foreach($products as $product)
            <div class="text-center col-xs-6 col-sm-4 col-md-3 col-lg-2 browse-product">
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
