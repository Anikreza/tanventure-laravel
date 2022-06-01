<div class="carousel-item {{ $key ===  0 ? "active" : ''}}">
    <img src="{{$image}}" alt="{{$title}}"
         style="width: 100vw; height: 45vh; object-fit: cover;box-shadow: 2px 2px 16px 2px rgba(0,0,0,0.5);
         filter: sepia(30%)"
    />
    <hr/>
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <div class="carousel-caption ">
            <div class="carouselCaptions">
                <h5>{{$title}}</h5>
                <p>{{trans('general.by')}} {{$article['author']['name']}}</p>
                <h2>{{trans('general.readMore')}} <i class="fa fa-caret-square-right" style="color: #ffffff"></i></h2>
            </div>
        </div>
    </a>
{{--    <a href="{{ route('article-details', ['slug' => $slug]) }}">--}}
{{--        <div class="customBanner d-sm-block d-lg-none carouselCaptions">--}}
{{--            <h5>{{$title}}</h5>--}}
{{--            <p>{{$description}}</p>--}}
{{--        </div>--}}
{{--    </a>--}}
</div>
