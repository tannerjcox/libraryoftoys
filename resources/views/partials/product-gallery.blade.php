
<div class="carousel" data-indicators="true">
    @foreach($product->images()->get() as $image)
        <a class="carousel-item" href="#"><img src="{{$image->mediumUrl}}" ></a>
    @endforeach
</div>