<h4>Customer Reviews</h4>
@if($reviewable->reviews->count())
    @foreach($reviewable->reviews as $review)
        <h4>
            {!! $review->renderRating() !!}
            {!! $review->title !!}
        </h4>
        By {!! $review->user->firstName . ' on ' . $review->created_at !!} <br>
        @if($review->user->verifiedInteraction($reviewable))
            Verified Interaction
        @endif
        <p>
            {!! $review->description !!}
        </p>
    @endforeach
@else
    <div>No Reviews</div>
@endif