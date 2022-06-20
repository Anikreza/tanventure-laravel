{{--<div style="background-image:url({{asset("assets/images/$key.png")}});background-size: contain; filter: blur(7px); opacity: .4; height: 24rem"><</div>--}}

<div class="post-entry d-sm-flex d-block align-items-start   w3-animate-zoom customSearchCard">
            <div class="post-content">
                <h3 style="width: 420%;margin-top: -60px; font-weight: 400; font-size: 2.5vh">
                    <a href="{{ route('article-details', ['slug' => $slug]) }}" style="color: #106b46 !important; ">{{$title}}</a>
                </h3>

                <a href="{{ route('article-details', ['slug' => $slug]) }}">
                    <img src="{{asset($image)}}" alt="" style="width:100%; object-fit: fill; box-shadow: 3px 3px 3px 3px #000000; border-radius: 5px">
                </a>

                <div style="display: flex" >
                    <div class="post-date" style="margin-top: -30px; margin-left: -10px">
                        <p>Mar <strong>19</strong></p>
                    </div>

                    <div class="post-author d-flex align-items-start" style="padding: 1rem">
                        <a href="{{route('about')}}">
                        <div class="post-author d-flex align-items-center flex-shrink-0 align-self-start">
                            <a href="{{route('author',['slug' => $article['author']['id']])}}">
                            <img src="{{asset($article->author->image)}}" alt="" style="width: 5vh; height: 5vh;border-radius: 50%">
                            </a>
                        </div>
                        </a>
                        <div class="author-name" style="width: 150px">
                            <a href="{{route('author',['slug' => $article['author']['id']])}}">
                            <p class="customFont" style="font-size: 1rem;">{{$article->author->name}}</p>
                            </a>
                        </div>
                        <div class="post-tag d-flex" style="margin-left: 10px">
{{--                            <ul class="post-cat">--}}
{{--                                <a href="{{ route('category', ['slug' =>  $category['slug'.'_'.app()->getLocale()]]) }}"><em class="icon ti-bookmark"></em>--}}
{{--                                    <span>{{$category['name'.'_'.app()->getLocale()]}}</span>--}}
{{--                                </a>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
    <div>
{{--        <div>--}}
{{--            <a href="{{ route('article-details', ['slug' => $slug]) }}">--}}
{{--                <img src="{{asset($image)}}" alt="" style="width:90%; object-fit: fill; box-shadow: 3px 3px 3px 3px #000000; border-radius: 5px">--}}
{{--            </a>--}}
{{--        </div>--}}
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <div class="content customFont grid-sm-3" style="height: 255px; overflow: hidden;width: 100%; text-align: right; margin-left: 20px; margin-top: 30px; font-size: 1.3rem;font-weight: 500">
            {!! $description !!}
        </div>
        </a>
        <a style="margin-left: 20px; font-weight: 300; font-size: 2.6vh" href="{{ route('article-details', ['slug' => $slug]) }}" class="btn-primary btn-arrow">Read More</a>
    </div>
</div>
