<div class="post-entry d-sm-flex d-block align-items-start">
    <div class="content-left d-flex">
        <div class="post-date">
            <p style="font-size: 1rem">{{ trans('general.'.$article->created_at->translatedFormat('M'))}} <strong
                    style="font-weight: lighter; font-size: 1.5rem">'{{trans('general.'.$article->created_at->translatedFormat('y'))}}</strong>
            </p>
        </div>
        <ul class="text-center  d-sm-none d-lg-block social" style="font-size:1vh">
            @foreach($shareLinks as $key=>$link)
                <li><a href="{{$link}}" target="_blank" class="pin fab fa-{{$key}}"></a></li>
            @endforeach
        </ul>
    </div>
    <div class="post-content post-content-wd">
        <div class="post-meta d-block d-lg-flex align-items-center">
            <a href="{{route('author',['slug' => $article['author']['id']])}}">
                <div
                    class="post-author d-flex align-items-center flex-shrink-0 align-self-start">
                    <div>
                        <img src="{{asset($article['author']['image'])}}"
                             alt="{{$article['title'.'_'.app()->getLocale()]}}"
                             style="width: 6vh; height: 6vh; border-radius: 50%; object-fit: cover"
                        />
                    </div>
                    <div class="author-name">
                        <p style="font-size: 1.9vh; color: #097349">{{$article['author']['name']}}</p>
                    </div>
                </div>
            </a>
            <div class="post-tag  d-flex align-items-center"
                 style="background: rgba(0,0,0,.1); width: fit-content; padding: 1px 2rem 1px 2rem">
                <ul class="post-cat" style="font-size:1.8vh">
                    <li><a class="customFont"
                           href="{{ route('category', ['slug' =>  $category['slug'.'_'.app()->getLocale()]]) }}"><em
                                class="icon ti-bookmark"></em>
                            <span>{{ $category['name'.'_'.app()->getLocale()] }}</span>
                        </a>
                    </li>
                </ul>
                <ul class="d-lg-none d-sm-block">
                    <li>
                        <a style="font-size: 1.8vh;">|| {{$article->created_at->translatedFormat('M')}}
                            '{{$article->created_at->translatedFormat('y')}}</a></li>
                </ul>

            </div>
        </div>
        <h3 style="font-size:3.6vh;color:#475E42FF; border-left: 20px solid #19b275; padding-left: 1rem; background: rgba(12,12,12,.1)">{{ $article['title'.'_'.app()->getLocale()]}}</h3>
        <hr/>
        {{--                            mobile share--}}
        <div class="d-md-flex  d-lg-none" style=" font-size:2vh;">
            <span class="label-primary">SHARE:</span>
            @foreach($shareLinks as $key=>$link)
                <a class="post-tag" target="_blank" href="{{$link}}">
                                <span
                                    style=" font-size:2vh; margin-left: 10px; background-color:rgb(25,178,117); color: #ffffff; padding: 10px; border-radius: 5px"
                                    class=" post-tag pin fab fa-{{$key}}"
                                >
                                </span>
                </a>
            @endforeach
        </div>
        <br/>
        <hr class="d-sm-block d-lg-none"/>
        {{--                            mobile share--}}
        <div class="content articleContent" style="text-align: justify; font-size: 2vh;">
            {!! $article['description'.'_'.app()->getLocale()] !!}
        </div>
    </div>
</div>
