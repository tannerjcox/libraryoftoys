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
        formData.append('product_id', $('[name=id]').val());
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
    @if(isset($product))
        {!! BootForm::open()->put()->action(route('products.update', $product->id)) !!}
        {!! BootForm::bind($product) !!}
        {!! BootForm::hidden('id') !!}
    @else
        {!! BootForm::open()->post()->action(route('products.store')) !!}
    @endif
    <div class="card z-depth-5">
        <div class="card-content">
            <div class="card-title">
                @if(isset($product))
                    <span class="pull-right">{!! link_to_route('product.show', 'View Product', ['name' => str_slug($product->name), 'id' => $product->id, 'preview' => true], ['target' => '_blank', 'class' => 'btn btn-info']) !!}</span>
                @endif
                <h4>
                    @if(isset($product))
                        Edit <strong>{{ $product->name }}</strong>
                    @else
                        Create New Product
                    @endif
                </h4>
            </div>
            <div class="row">
                <div class="col m8 input-field">
                    {!! BootForm::text('Name', 'name')->attribute('data-length', 100) !!}
                </div>
                <div class="col m2 input-field">
                    {!! BootForm::text('Price', 'price') !!}
                </div>
                @if(isset($product))
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
                <div class="col s2">
                    {!! Form::label('is_enabled', 'Is Enabled') !!}
                    <p>
                        <input name="is_enabled" type="radio" id="is_enabled_yes" {{ isset($product) && $product->is_enabled ? 'checked' : '' }} value="1"/>
                        <label for="is_enabled_yes">Yes</label>
                    </p>
                    <p>
                        <input name="is_enabled" type="radio" id="is_enabled_no" {{ isset($product) && !$product->is_enabled ? 'checked' : '' }} value="0"/>
                        <label for="is_enabled_no">No</label>
                    </p>
                </div>
                @if(Auth::user()->isAdmin())
                    <div class="col m2">
                        {!! Form::label('is_approved', 'Is Approved') !!}
                        <p>
                            <input name="is_approved" type="radio" id="is_approved_yes" {{ isset($product) && $product->is_approved ? 'checked' : '' }} value="1"/>
                            <label for="is_approved_yes">Yes</label>
                        </p>
                        <p>
                            <input name="is_approved" type="radio" id="is_approved_no" {{ isset($product) && !$product->is_approved ? 'checked' : '' }} value="0"/>
                            <label for="is_approved_no">No</label>
                        </p>
                    </div>
                @endif
                <div class="col m6 input-field">
                    {!! BootForm::textarea('Description', 'description')->rows(5)->class('materialize-textarea') !!}
                </div>
            </div>
        </div>
        <div class="card-action right-align">
            {!! BootForm::hidden('images')->value('') !!}
            {!! BootForm::submit()->class('btn waves-effect waves-light') !!}
        </div>
    </div>
    {!! BootForm::close() !!}

    @if(!isset($product))
        {!! BootForm::open()->post()->action(route('images.upload'))->class('dropzone col m6 card z-depth-3')->style("height:300px") !!}
        {!! BootForm::close() !!}
    @else
        {!! BootForm::open()->post()->action(route('products.upload-images', $product->id))->class('dropzone col m6 card z-depth-3')->attribute('data-product-id', $product->id)->style("height:300px") !!}
        {!! BootForm::close() !!}
    @endif
@stop