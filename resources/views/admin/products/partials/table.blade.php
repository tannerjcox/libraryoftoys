<table class="responsive-table striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>User</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                {{ link_to_route('products.edit', $product->id, $product->id) }}
            </td>
            <td>
                <span title="Preview Product">
                    {{ link_to_route('product.show', $product->name, ['name' => $product->url,'id' => $product->id, 'preview' => !$product->isAvailable()], ['target' => '_blank']) }}
                </span>
            </td>
            <td>
                {{ link_to_route('users.edit', $product->user->name, $product->user->id) }}
            </td>
            <td>
                {{ prettyDate($product->created_at) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>