@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('content')
    <div class="col-md-10 col-md-offset-1">
        @if($preview)
            <div class="row">
                <div class="alert alert-danger text-center col-md-6 col-md-offset-3">This is a preview only, this product may or may not be purchasable</div>
            </div>
        @endif
        @if(Auth::user() && Auth::user()->isAdmin())
            <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
        @endif
        <h1 class="text-center">
            {{ $product->name }}:
            {{ formatMoney($product->price) }}
        </h1>
        {{ $product->description }}
    </div>
@stop