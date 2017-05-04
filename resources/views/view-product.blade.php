@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('content')
    <div class="col-xs-12">
        @if($preview && !$product->is_enabled)
            <div class="row">
                <div class="alert alert-danger text-center col-md-6 col-md-offset-3">This is a preview only, this
                    product is not purchasable
                </div>
            </div>
        @endif
        @if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id == $product->user_id))
            <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
        @endif
        <h1 class="text-center">
            {{ $product->name }}
        </h1>
        <div class="col-md-6">
            @if($product->images()->count())
                @include('partials.product-gallery')
            @else
                <div>
                    Images Coming Soon
                </div>
            @endif
        </div>
        <div class="col-md-6">
            {!! BootForm::open()->get()->action(route('cart.add', $product->id)) !!}
            <h3>
                Price: {{ formatMoney($product->price) }}
            </h3>
            <div class="col-xs-6 col-md-3 pull-right">
                @if($product->isAvailable())
                    {!! BootForm::select('Quantity', 'quantity', $product->qtyOptionsArray)->select(1) !!}
                    {!! BootForm::button('Add to Cart')->type('submit')->class('btn btn-primary') !!}
                @endif
            </div>
            {!! BootForm::close() !!}
            <div class="clearfix"></div>
            {!! $product->description !!}
        </div>
    </div>
@stop