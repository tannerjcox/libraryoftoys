@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"
            integrity="sha256-+kAcWA0klKCshjLIEEFOV51LntaiEdbldotJbI99Bh0=" crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('.carousel-selector-link').hover(function () {
          $(this).click()
        })
        $('#myCarousel').find('.item').each(function () {
          $(this).zoom({
            url: $(this).data('image')
          })
        })
      })
    </script>
@stop
@section('styles')
    <style>
        .carousel-selector-link img {
            max-width: 75px;
            max-height: unset;
            border: 1px solid black;
        }

        .main-image {
            max-height: 350px;
        }

        @media (max-width: 768px) {
            .carousel-selector-link img {
                max-height: 75px;
                max-width: unset;
            }
        }
    </style>
@stop
@section('content')
    <div class="col-xs-12">
        @if($preview && !$product->is_enabled)
            <div class="row">
                <div class="alert alert-danger text-center col-md-6 col-md-offset-3">
                    This is a preview only, this product is not purchasable
                </div>
            </div>
        @endif
        @if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id == $product->user_id))
            <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
        @endif
        <div class="col-md-6 col-xs-12">
            @if($product->images()->count())
                @include('partials.product-gallery')
            @else
                <div>
                    Images Coming Soon
                </div>
            @endif
        </div>
        <div class="col-md-6 col-xs-12">
            <h1 class="text-center">
                {{ $product->name }}
            </h1>
            <h3>
                Price: {{ formatMoney($product->price) }}
            </h3>
            <div class="col-xs-6 col-md-3 pull-right">
                @if($product->isAvailable())
                    {!! BootForm::open()->get()->action('\add-to-cart') !!}
                    {!! BootForm::select('Quantity', 'quantity', $product->qtyOptionsArray)->select(1) !!}
                    {!! BootForm::button('Add to Cart')->type('submit')->class('btn btn-primary') !!}
                    {!! BootForm::close() !!}
                @endif
            </div>
            <div class="clearfix">
                {!! $product->description !!}
            </div>
        </div>
    </div>
@stop
