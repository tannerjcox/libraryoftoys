@extends('layouts.account')
@section('title')
    Products
@stop

@section('content')
    <div class="card">
        <div class="card-content hoverable">
            <div class="card-title">
                Products
            </div>
            @include('admin.products.partials.table')
            <div class="right-align">
                <a href="{{ route('products.create') }}" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>

            </div>
            {!!  $products->links('partials.pagination') !!}
        </div>
    </div>
@stop