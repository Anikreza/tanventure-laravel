<div class="contentHover">
    <div class="content-overlay"></div>
    <div>
        <img class="content-image" src="{{asset($image)}}" style="width: 100%; border-radius: 5px"
             alt="{{$title}}"/>
    </div>
    <div class="content-details fadeIn-bottom">
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
            <p class="content-text">{{$description}}</p>
        </a>
    </div>
    {{--    </div>--}}

    <div class="post-content">
        <ul class="post-tag">
            <li>
                <a href='{{route('about')}}'>
                    <span class="customFont">{{$author}}</span>
                </a>
                <a>
                    <span class="customFont">||</span>
                </a>
                <a href="{{route('about')}}">
                    <span class="customFont">{{trans('general.'.$article->created_at->translatedFormat('M'))}} '{{trans('general.'.$article->created_at->translatedFormat('y'))}}</span>
                </a>
            </li>
        </ul>
        <div class="post-author d-flex align-items-center customAuthorName">
            <div class="author-thumb">

            </div>
        </div><!-- author -->
        <h4 style="text-align: center">{{$title}}</h4>
        <p class="customThumbDescription">{{$description}}</p>
        {{--        <a href="{{ route('article-details', ['slug' => $slug]) }}" class="btn-primary btn-arrow">Read More</a>--}}
    </div>
</div>
