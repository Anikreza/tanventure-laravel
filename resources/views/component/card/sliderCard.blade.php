<div class="carousel-item {{ $key ===  0 ? "active" : ''}}">
    <img src="{{$image}}" alt="{{$title}}" style="width: 100vw; object-fit: cover"/>
<div class="carousel-caption d-sm-none d-lg-block">
    <h5>{{$title}}</h5>
    <p>{{$description}}</p>
</div>
    <div class="customBanner d-sm-block d-lg-none">
        <h5>{{$title}}</h5>
        <p>{{$description}}</p>
    </div>
</div>
