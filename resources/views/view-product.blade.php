@extends('layouts.app')
@section('title')
    {{ $product->name }}
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"
            integrity="sha256-+kAcWA0klKCshjLIEEFOV51LntaiEdbldotJbI99Bh0=" crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('.carousel').carousel()

        $('.rating-star').hover(
          function () {
            updateStarColor($(this))
          }, function () {
            let rating = $('[name=rating]').val()
            if (!rating) {
              $(this).addClass('fa-star-o').removeClass('fa-star')
              $(this).prevAll().addClass('fa-star-o').removeClass('fa-star')
            } else {
              updateStarColor($('[data-star=' + rating + ']'))
            }
          }
        ).click(function () {
          $('[name=rating]').val($(this).data('star'))
          $(this).nextAll().addClass('fa-star-o').removeClass('fa-star')
        })

        function updateStarColor ($star) {
          $star.addClass('fa-star').removeClass('fa-star-o')
          $star.prevAll().addClass('fa-star').removeClass('fa-star-o')
          $star.nextAll().addClass('fa-star-o').removeClass('fa-star')
        }
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
                <h3 class="center-align">
                    Images Coming Soon
                </h3>
            @endif
        </div>
        <div class="col m6">
            <div class="row">
                <div class="col m8">
                    <h6>
                        {{ $product->user->name }}
                        {!! $product->user->renderRating !!}
                    </h6>
                    <h3>
                        {{ $product->name }}
                    </h3>
                    <h5>
                        {!! $product->renderRating !!}
                        {!! $product->reviews->count() !!} customer reviews
                    </h5>
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
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6">
                            <a class="active" href="#description"><i class="material-icons">description</i> Description</a>
                        </li>
                        <li class="tab col s6">
                            <a href="#reviews"><i class="material-icons">question_answer</i>Reviews</a>
                        </li>
                    </ul>
                </div>
                <div id="description" class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">Description</div>
                            <span>{!! $product->description !!}</span>
                        </div>
                    </div>
                </div>
                <div id="reviews" class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">Description</div>
                            <div>
                                @include('reviews.create')
                            </div>
                            @include('reviews.show', ['reviewable' => $product])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div>--}}
    {{--<ul class="collapsible" data-collapsible="expandable">--}}
    {{--<li>--}}
    {{--<div class="collapsible-header">Details</div>--}}
    {{--<div class="collapsible-body">--}}
    {{--<span>{!! $product->description !!}</span>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<div class="collapsible-header">Reviews</div>--}}
    {{--<div class="collapsible-body">--}}
    {{--<div>--}}
    {{--@include('reviews.create')--}}
    {{--</div>--}}
    {{--@include('reviews.show', ['reviewable' => $product])--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    </div>
    </div>
@stop
