<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($product->images()->get() as $image)
            <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}">
            </li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($product->images()->get() as $image)
            <div class="item {{ $loop->first ? 'active' : '' }} text-center">
                <img src="{{ $image->url }}" alt="{{ $product->name }}"
                     style="max-height:300px;height:auto;width:auto;margin:auto">
            </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<ul class="list-inline text-center">
    @foreach($product->images()->get() as $image)
        <li class="col-xs-3" style="padding:5px">
            <a id="carousel-selector-{{ $loop->index }}" class="{{ $loop->first ? 'selected' : '' }}">
                <img src="{{ $image->thumbnailUrl }}" style="max-height:75px">
            </a>
        </li>
    @endforeach
</ul>