@extends('layouts.app')
@section('title')
    Browse Products
@stop
@section('content')
    <div class="container center-align">
        <h1 class="center-align">
            Browse Products
        </h1>
        @if(!$products->count())
            We're sorry, there are no products currently available
        @endif
        <div class="row">
            @foreach($products as $product)
                <div class="card hoverable center-align col s5 m3 l2 browse-product">
                    <div class="p-sm browse-product-child">
                        <a href="{{ $product->url }}" data-toggle="tooltip" data-tooltip="{{ $product->name }}" >
                            {!! $product->mainThumbnail ?: '<img src="' . asset('images/toytrader.ico') . '">' !!}<br>
                            <span class="truncate">
                                {{ $product->name }}
                            </span><br>
                        </a>
                        {!! $product->renderRating !!}
                        {{ formatMoney($product->renderedPrice) }}<br>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {!! $products->links('partials.pagination') !!}
        </div>
    </div>
@stop
