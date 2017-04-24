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
                            {{ link_to_route('products.edit', $product->title, $product->id) }}
                        </td>
                        <td>
                            <a href="/{{ $product->url }}?preview=1" target="_blank">View</a>
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
            <a href="{{ route('vendor-products.create') }}" class="btn btn-primary">Create Product</a>
        </div>
    </div>
    {{ $products->links() }}
@stop