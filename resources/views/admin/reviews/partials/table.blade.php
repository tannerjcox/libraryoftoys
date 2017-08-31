<table class="responsive-table striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Rating</th>
        <th>User</th>
        <th>Product / User</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reviews as $review)
        <tr>
            <td>
                {{ link_to_route('reviews.edit', $review->id, $review->id) }}
            </td>
            <td>
                {!! $review->title !!}
            </td>
            <td>
                {!! $review->renderRating() . "(" . $review->rating . ")" !!}
            </td>
            <td>
                {{ link_to_route('users.edit', $review->user->name, $review->user->id) }}
            </td>
            <td>
                @if($review->reviewable->email)
                    {!! link_to_route('users.edit', $review->reviewable->name, $review->reviewable->id) !!}
                @else
                    {{ link_to_route('product.show', $review->reviewable->name, ['name' => $review->reviewable->url,'id' => $review->reviewable->id, 'preview' => !$review->reviewable->isAvailable()], ['target' => '_blank']) }}
                @endif
            </td>
            <td>
                {{ prettyDate($review->created_at) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>