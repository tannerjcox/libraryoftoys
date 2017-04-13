@extends('layouts.account')
@section('title')
    {{ $user->name }}'s Products
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $user->name }}'s Products</h3>
        </div>
        <div class="panel-body">
            @include('admin.products.partials.table', ['products' => $user->products])
        </div>
        <div class="panel-footer text-right">
            <a href="{{ route('products.create', ['user_id' => $user->id]) }}" class="btn btn-success">Create Product</a>
        </div>
    </div>
@stop