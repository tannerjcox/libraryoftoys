@extends('layouts.account')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
      $(function () {
        $('.carousel').carousel()
      })

      Dropzone.autoDiscover = false
      let myDropzone = new Dropzone('form.dropzone')
      myDropzone.on('sending', function (file, xhr, formData) {
        formData.append('product_id', $('[name=id]').val())
      })
      myDropzone.on('complete', function (file) {
        path = JSON.parse(file.xhr.response).path
        if ($('[name=images]').val() !== '') {
          $('[name=images]').val($('[name=images]').val() + ',' + path)
        } else {
          $('[name=images]').val(path)
        }
      })
    </script>
@stop
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <style>
        .carousel-selector-link img {
            max-width: 75px;
            max-height: unset;
            border: 1px solid black;
        }

        .main-image {
            height: 350px !important;
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
    {!! BootForm::open()->put()->action(route('reviews.update', $review->id)) !!}
    {!! BootForm::bind($review) !!}
    {!! BootForm::hidden('id') !!}
    <div class="card z-depth-5">
        <div class="card-content">
            <div class="card-title">
                <h4>
                    @if(isset($review))
                        Edit <strong>{{ $review->title }}</strong>
                    @else
                        Create New Product
                    @endif
                </h4>
            </div>
            <div class="row">
                <div class="col m4 input-field">
                    {!! BootForm::text('Title', 'title') !!}
                </div>
                <div class="col m2 input-field">
                    {!! BootForm::text('Rating', 'rating') !!}
                </div>
                <div class="col m6 input-field">
                    {!! BootForm::textarea('Description', 'description')->rows(5)->class('materialize-textarea') !!}
                </div>
            </div>
        </div>
        <div class="card-action right-align">
            {!! BootForm::submit()->class('btn waves-effect waves-light') !!}
        </div>
    </div>
    {!! BootForm::close() !!}

@stop