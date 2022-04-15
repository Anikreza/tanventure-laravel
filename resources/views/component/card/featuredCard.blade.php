<div class="post-thumb" style="background-color: #7a2828">
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <img src="{{asset($image)}}" style="width: 100%; border-radius: 5px" alt="{{$title}}"/>
    </a>
</div>
<div class="post-content">
    <ul class="post-tag">
        <li>
            <a href='{{route('about')}}'>
                <img style="width: 40px; border-radius: 100%" src="{{asset('assets/images/pp.jpg')}}"/>
            </a>
            <a href="{{route('about')}}">
                <span  style="color: #4d1219">তানভীর রেজা অনিক</span>
            </a>
        </li>
{{--        <li><a href="">--}}
{{--                <span style="color: #475e42">DECEMBER 08, 2018</span></a>--}}
{{--        </li>--}}
    </ul>
    <h4><a href="{{ route('article-details', ['slug' => $slug]) }}">{{$title}}</a></h4>
    <p class="customThumbDescription">{{$description}}</p>
    <a href="{{ route('article-details', ['slug' => $slug]) }}" class="btn-primary btn-arrow">Read More</a>
</div>
