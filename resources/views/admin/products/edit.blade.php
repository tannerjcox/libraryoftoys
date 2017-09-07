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
    <div class="card z-depth-5">
        <div class="right col m6 p-t-md">
            @if(!$product)
                {!! BootForm::open()->post()->action(route('images.upload'))->class('dropzone')->style("height:300px") !!}
                {!! BootForm::close() !!}

                @if ($errors->has('images'))
                    <div class="has-error">
                        <span class="help-block">
                            <strong>{{ $errors->first('images') }}</strong>
                        </span>
                    </div>
                @endif
            @else
                {!! BootForm::open()->post()->action(route('products.upload-images', $product->id))->class('dropzone')->attribute('data-product-id', $product->id)->style("height:300px") !!}
                {!! BootForm::close() !!}
            @endif
        </div>
        @if($product)
            {!! BootForm::open()->put()->action(route('products.update', $product->id)) !!}
            {!! BootForm::bind($product) !!}
            {!! Form::model($product) !!}
            {!! BootForm::hidden('id') !!}
        @else
            {!! BootForm::open()->post()->action(route('products.store')) !!}
        @endif
        <div class="card-content">
            <div class="card-title">
                @if($product)
                    <span class="pull-right">{!! link_to_route('product.show', 'View Product', ['name' => str_slug($product->name), 'id' => $product->id, 'preview' => true], ['target' => '_blank', 'class' => 'btn btn-info']) !!}</span>
                @endif
                <h4>
                    @if($product)
                        Edit <strong>{{ $product->name }}</strong>
                    @else
                        Create New Product
                    @endif
                </h4>
            </div>
            <div class="row">
                <div class="col m6 input-field">
                    {!! BootForm::text('Name', 'name')->attribute('data-length', 100) !!}
                </div>
                <div class="col m2 input-field">
                    {!! BootForm::text('Price', 'price') !!}
                </div>
                @if($product)
                    <div class="col m6">
                        @if($product->images()->count())
                            @include('partials.product-gallery')
                        @else
                            <div>
                                No images
                            </div>
                        @endif
                    </div>
                @endif
                <div class="col s2 {{ $errors->has('is_enabled') ? 'has-error' : '' }}">
                    {!! Form::label('is_enabled', 'Is Enabled') !!}
                    <div class="row">
                        <input name="is_enabled" type="radio" id="is_enabled_yes" value="1" {{ $product && $product->is_enabled ? 'checked' : '' }}/>
                        {!! Form::label('is_enabled_yes', 'Yes') !!}
                        <input name="is_enabled" type="radio" id="is_enabled_no" value="0" {{ $product && $product->is_enabled ? '' : 'checked'}}/>
                        {!! Form::label('is_enabled_no', 'No') !!}
                    </div>
                    @if ($errors->has('is_enabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('is_enabled') }}</strong>
                        </span>
                    @endif
                </div>
                @if(Auth::user()->isAdmin())
                    <div class="col s2 {{ $errors->has('is_approved') ? 'has-error' : '' }}">
                        {!! Form::label('is_approved', 'Is Approved') !!}
                        <div class="row">
                            <input name="is_approved" type="radio" id="is_approved_yes" value="1" {{ $product && $product->is_approved ? 'checked' : '' }}/>
                            {!! Form::label('is_approved_yes', 'Yes') !!}
                            <input name="is_approved" type="radio" id="is_approved_no" value="0" {{ $product && $product->is_approved ? '' : 'checked'}}/>
                            {!! Form::label('is_approved_no', 'No') !!}
                        </div>
                        @if ($errors->has('is_approved'))
                            <span class="help-block">
                            <strong>{{ $errors->first('is_approved') }}</strong>
                        </span>
                        @endif
                    </div>
                @endif
                <div class="col m6 input-field">
                    {!! BootForm::textarea('Description', 'description')->rows(5)->class('materialize-textarea') !!}
                </div>
            </div>
        </div>
        <div class="card-action right-align">
            @if(!$product)
                {!! BootForm::hidden('images')->value('') !!}
            @endif
            {!! BootForm::submit()->class('btn waves-effect waves-light') !!}
        </div>
        {!! BootForm::close() !!}
    </div>

@stop