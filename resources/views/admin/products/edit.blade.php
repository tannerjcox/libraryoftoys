@extends('layouts.account')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
      $(function () {
        $('[name=title]').keyup(function () {
          var title = $(this).val()
          $('[name=url]').val(title.replace(/ /g, '-'))
        })
      })

      Dropzone.autoDiscover = false
      var myDZ = new Dropzone('form.dropzone')
      myDZ.on('complete', function (file) {
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
@stop
@section('content')
    @if(isset($product))
        {!! BootForm::open()->put()->action(route('products.update', $product->id)) !!}
        {!! BootForm::bind($product) !!}
        {!! BootForm::hidden('id') !!}
    @else
        {!! BootForm::open()->post()->action(route('products.store')) !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
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
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    {!! BootForm::text('Name', 'name') !!}
                </div>
                <div class="col-md-6">
                    {!! BootForm::text('Price', 'price') !!}
                </div>
            </div>
            {!! BootForm::textarea('Description', 'description')->rows(5)->defaultValue(isset($product) ? $product->page_content : '') !!}
        </div>
        <div class="panel-footer text-right">
            {!! BootForm::hidden('images')->value('') !!}
            {!! BootForm::submit()->class('btn btn-success text-right') !!}
        </div>
    </div>
    {!! BootForm::close() !!}

    {!! BootForm::open()->post()->action(route('images.store'))->class('dropzone col-md-6')->style("height:300px") !!}
    {!! BootForm::close() !!}
    @if(isset($product))
        @if($product->images()->count())
            <div class="col-md-6">
                @include('partials.product-gallery')
            </div>
        @else
            <div>
                No images
            </div>
        @endif
    @endif
@stop