@extends('layouts.account')
@section('title')
    Products
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Products</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ link_to_route('products.edit', $product->name, $product->id) }}
                        </td>
                        <td>
                            {!! $product->previewLink !!}
                        </td>
                        <td>
                            {{ prettyDate($product->created_at) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer text-right">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
        </div>
    </div>
    {{ $products->links() }}
@stop