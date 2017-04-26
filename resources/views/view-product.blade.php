@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('scripts')
    <script>
      $(function () {

      })
    </script>
@stop
@section('content')
    <div class="col-md-10 col-md-offset-1">
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
            {{ $product->name }}:
            {{ formatMoney($product->price) }}
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
            {!! $product->description !!}
        </div>
    </div>
@stop