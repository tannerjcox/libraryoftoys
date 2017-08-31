<h5>Customer Reviews</h5>
@if($reviewable->reviews->count())
    @foreach($reviewable->reviews()->orderBy('created_at', 'desc')->limit(5)->get() as $review)
        <h5>
            {!! $review->renderRating() !!}
            {!! $review->title !!}
        </h5>
        By {!! $review->user->firstName . ' on ' . $review->created_at !!} <br>
        @if($review->user->verifiedInteraction($reviewable))
            Verified Renter
        @endif
        <p>
            {!! $review->description !!}
        </p>
    @endforeach
    @if($reviewable->reviews->count() > 5)
        See More Reviews
    @endif
@else
    <div>No Reviews</div>
@endif