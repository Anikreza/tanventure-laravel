
<div class="contentHoverTop">
    <div class="content-overlay"></div>
    <div>
        <img src="{{asset($image)}}" style="width: 100%;  border-radius: 5px"/>
    </div>
    <div class="content-details fadeIn-bottom">
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
            <p class="content-text">{{$description}}</p>
        </a>
    </div>
    {{--    </div>--}}

    <div class="post-entry d-sm-flex d-block align-items-start">
        <div class="post-date">
            <p>{{$time->translatedFormat('M')}} <strong style="font-weight: lighter">'{{$time->translatedFormat('y')}}</strong></p>
        </div>
        <div class="post-content">
            <div class="post-meta d-flex align-items-center">
                <div class="post-author d-flex align-items-center customAuthorName">
                    <div class="author-thumb">
                        <a href='{{route('about')}}'>
                            <img style="width: 6vh; height: 6vh; border-radius: 50%; object-fit: cover" src="{{$article['author']['image']}}" alt="{{$title}}"/>
                        </a>
                    </div>
                    <div class="author-name" >
                        <a href='{{route('about')}}'>
                            <p style="color: #4d1219">{{$author}}</p>
                        </a>
                    </div>
                </div><!-- author -->
                <div class="post-tag">
                    <ul class="post-cat">
                        <li><a href="{{ route('category', ['slug' =>  $category->slug]) }}"><em class="icon ti-bookmark"></em> {{$category->name}}</a></li>
                    </ul>
                </div><!-- .post-tag -->
            </div>
            <h4 style="color: #155b3f;"><a href="{{ route('article-details', ['slug' => $slug]) }}">{{$title}}</a></h4>
            <p class="customThumbDescription">{{$description}}</p>
        </div>
    </div>
</div>



