@if(!Auth::user())
    <h5>Please Log In to leave a review</h5>
@elseif(Auth::user()->hasReviewedProduct($product->id))
    <h6>You've already reviewed this product, thank you for your review!</h6>
@else
    <h5>Leave a Review</h5>
    {!! BootForm::open()->post()->action(route('review.store')) !!}
    <div class="row">
        <div class="input-field col s8">
            {!! BootForm::text('Title', 'title') !!}
        </div>
        <div class="col s4">
            <div class="fa fa-star-o fa-2x rating-star" data-star="1"></div>
            <div class="fa fa-star-o fa-2x rating-star" data-star="2"></div>
            <div class="fa fa-star-o fa-2x rating-star" data-star="3"></div>
            <div class="fa fa-star-o fa-2x rating-star" data-star="4"></div>
            <div class="fa fa-star-o fa-2x rating-star" data-star="5"></div>
        </div>
    </div>
    <div class="input-field">
        {!! BootForm::textArea('Review', 'description')->rows(5)->class('materialize-textarea') !!}
    </div>
    {!! BootForm::hidden('product_id')->value($product->id) !!}
    {!! BootForm::hidden('rating') !!}
    {!! BootForm::hidden('user_id')->value(Auth::user()->id) !!}
    {!! BootForm::button('Submit')->type('submit')->class('btn btn-primary') !!}
    {!! BootForm::close() !!}
@endif