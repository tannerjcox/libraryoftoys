@if(Auth::user())
    <h4>Leave a Review</h4>
    {!! BootForm::open()->post()->action(route('review.store')) !!}
    {!! BootForm::text('Title', 'title') !!}
    {!! BootForm::textArea('Review', 'description')->rows(5) !!}
    {!! BootForm::hidden('product_id')->value($product->id) !!}
    {!! BootForm::button('Submit')->type('submit')->class('btn btn-primary') !!}
    {!! BootForm::close() !!}
@else
    <h4>Please Log In to leave a review</h4>
@endif