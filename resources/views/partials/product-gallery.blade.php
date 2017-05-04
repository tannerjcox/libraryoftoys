<div id="myCarousel" class="carousel col-sm-10 col-xs-12 col-sm-push-2" data-ride="carousel" data-interval="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($product->images()->get() as $image)
            <div class="item {{ $loop->first ? 'active' : '' }} text-center" data-image="{{ $image->url }}">
                <img src="{{ $image->mediumUrl }}" alt="{{ $product->name }}"
                     style="height:auto;width:auto;margin:auto" class="main-image">
            </div>
        @endforeach
    </div>
</div>
<div class="col-sm-2 col-sm-pull-10">
    <ul class="list-unstyled text-center ">
        @foreach($product->images()->get() as $image)
            <li style="padding:5px" class="col-xs-3 col-sm-12">
                <a id="carousel-selector-{{ $loop->index }}" class="{{ $loop->first ? 'selected' : '' }} carousel-selector-link">
                    <img src="{{ $image->thumbnailUrl }}" style="border:1px solid black;">
                </a>
            </li>
        @endforeach
    </ul>
</div>
