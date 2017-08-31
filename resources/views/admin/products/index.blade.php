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
            <table class="responsive-table striped">
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
            <div class="right-align">
                <a href="{{ route('products.create') }}"  class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>

            </div>
        </div>
        {!!  $products->links() !!}
    </div>
@stop