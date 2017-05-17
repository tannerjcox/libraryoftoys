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
            height: 350px !important;
            max-width: 100%;
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
            <div class="row">
                <div class="col-md-8">
                    <h6>
                        {{ $product->supplierName }}
                        {{--                {!! $product->user->renderRating !!}--}}
                    </h6>
                    <h3>
                        {{ $product->name }}
                    </h3>
                    <h4>
                        {!! $product->renderRating !!}
                        {!! $product->reviews->count() !!} customer reviews
                    </h4>
                    <hr>
                    <h4 class="pull-left">
                        {{ formatMoney($product->price) }}
                    </h4>
                </div>

                <div class="col-md-4 pull-right">
                    @if($product->isAvailable() || $preview)
                        {!! BootForm::open()->get()->action('\add-to-cart') !!}
                        {!! BootForm::button('Add to Cart')->type('submit')->class('btn btn-primary') !!}
                        {!! BootForm::close() !!}
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active product-description" id="description">
                        {!! $product->description !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="reviews">
                        @include('reviews.show', ['reviewable' => $product])
                        <div>
                            @include('reviews.create')
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-description">
            </div>
        </div>
    </div>
@stop
