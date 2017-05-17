<h4>Customer Reviews</h4>
@if($reviewable->reviews->count())
    @foreach($reviewable->reviews()->orderBy('created_at', 'desc')->limit(5)->get() as $review)
        <h4>
            {!! $review->renderRating() !!}
            {!! $review->title !!}
        </h4>
        By {!! $review->user->firstName . ' on ' . $review->created_at .' ' . $review->user->id !!} <br>
        @if($review->user->verifiedInteraction($reviewable))
            Verified Renter
        @endif
        <p>
            {!! $review->description !!}
        </p>
    @endforeach
    @if($reviewable->reviews->count() > 5)
{{--        {!! link_to_route() !!}--}}
        See More Reviews
    @endif
@else
    <div>No Reviews</div>
@endif