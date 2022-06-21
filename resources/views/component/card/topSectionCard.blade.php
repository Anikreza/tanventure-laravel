
@if($category['name'.'_'.'en']!=='continents')

<div class="contentHoverTop">
    <div class="content-overlay"></div>
    <div>
        <img src="{{asset($image)}}" style="width: 97%;  border-radius: 5px"/>
    </div>
    <div class="content-details fadeIn-bottom">
{{--        <a href="{{ route('article-details', ['slug' => $slug]) }}">--}}
            <p class="content-text">{{$description}}</p>
{{--        </a>--}}
    </div>
    {{--    </div>--}}

    <div class="post-entry d-sm-flex d-block align-items-start">
        <div class="post-date">
            <p>{{trans('general.'.$time->translatedFormat('M'))}} <strong style="font-weight: lighter">'{{trans('general.'.$time->translatedFormat('y'))}}</strong></p>
        </div>
        <div class="post-content">
            <h4>{{$title}}</h4>

            <div class="post-meta d-flex align-items-center">
                <div class="post-author d-flex align-items-center customAuthorName">
                    <div class="post-author d-flex align-items-center flex-shrink-0 align-self-start">
                        <a href="{{route('author',['slug' => $authorId])}}">
                        <img style="width: 6vh; height: 6vh; border-radius: 50%; object-fit: cover" src="{{$article['author']['image']}}" alt="{{$title}}"/>
                        </a>
                    </div>
                    <div class="author-name" >
                        <a href="{{route('author',['slug' => $authorId])}}">
                            <p class="customFont" style="font-size: 1rem">{{$author}}</p>
                        </a>
                    </div>
                </div><!-- author -->
                <div class="post-tag">
                    <ul class="post-cat">
                        <li><a class="customFont" style="font-size: 1rem" href="{{ route('category', ['slug' =>  $category['slug'.'_'.app()->getLocale()]]) }}"><em class="icon ti-bookmark"></em> {{$category['name'.'_'.app()->getLocale()]}}</a></li>
                    </ul>
                </div><!-- .post-tag -->
            </div>
{{--            <h4>{{$title}}</h4>--}}
            <p class="customThumbDescription" >{{$description}}</p>
        </div>
    </div>
</div>
@endif


