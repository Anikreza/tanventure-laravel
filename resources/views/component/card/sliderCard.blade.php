<div class="slideshow-container">
    <div class="mySlides">
{{--        <div class="numbertext">1 / 3</div>--}}
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
            <img src="{{asset($image)}}" style="width: 100vw; height: 30vw; object-fit: cover; border-radius: 5px" alt="{{$title}}"/>
        </a>
        <div class="text">{{$title}}</div>
    </div>
</div>
<br>
