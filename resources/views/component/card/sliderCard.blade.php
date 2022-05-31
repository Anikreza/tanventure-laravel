<div class="carousel-item {{ $key ===  0 ? "active" : ''}}">
    <img src="{{$image}}" alt="{{$title}}" style="width: 100vw; height: 50vh; object-fit: cover"/>
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <div class="carousel-caption d-sm-none d-lg-block">
            <h5>{{$title}}</h5>
            <p>{{$description}}</p>
        </div>
    </a>
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <div class="customBanner d-sm-block d-lg-none">
            <h5>{{$title}}</h5>
            <p>{{$description}}</p>
        </div>
    </a>
</div>
