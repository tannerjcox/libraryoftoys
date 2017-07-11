@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"
            integrity="sha256-+kAcWA0klKCshjLIEEFOV51LntaiEdbldotJbI99Bh0=" crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('.carousel').carousel();
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
    <div class="row">
        @if($preview && !$product->is_enabled)
            <div class="col s8 offset-s2 center-align">
                <div class="card-panel white-text p-sm red">
                    This is a preview only, this product is not purchasable
                </div>
            </div>
        <div class="clearfix"></div>
        @endif
        @if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id == $product->user_id))
            <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
        @endif
        <div class="col m6 product-images">
            @if($product->images()->count())
                @include('partials.product-gallery')
            @else
                <div>
                    Images Coming Soon
                </div>
            @endif
        </div>
        <div class="col m6">
            <div class="row">
                <div class="col m8">
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

                <div class="col m4 pull-right">
                    @if($product->isAvailable() || $preview)
                        {!! BootForm::open()->get()->action('\add-to-cart') !!}
                        <a class="btn btn-large waves-effect waves-light">Rent Now</a>
                        {!! BootForm::close() !!}
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <div>
                <ul class="collapsible" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">description</i>Details</div>
                        <div class="collapsible-body">
                            <span>{!! $product->description !!}</span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">question_answer</i>Reviews</div>
                        <div class="collapsible-body">
                            <span>
                                @include('reviews.show', ['reviewable' => $product])
                                <div>
                                    @include('reviews.create')
                                </div>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
