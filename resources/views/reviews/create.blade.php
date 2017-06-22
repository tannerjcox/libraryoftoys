@if(!Auth::user())
    <h5>Please Log In to leave a review</h5>
@elseif(Auth::user()->hasReviewedProduct($product->id))
    <h5>Thank you for your review!</h5>
@else
    <h5>Leave a Review</h5>
    {!! BootForm::open()->post()->action(route('review.store')) !!}
        {!! BootForm::text('Title', 'title') !!}
        {!! BootForm::textArea('Review', 'description')->rows(5) !!}
        {!! BootForm::hidden('product_id')->value($product->id) !!}
        {!! BootForm::hidden('rating')->value(5) !!}
        {!! BootForm::hidden('user_id')->value(Auth::user()->id) !!}
        {!! BootForm::button('Submit')->type('submit')->class('btn btn-primary') !!}
    {!! BootForm::close() !!}
@endif