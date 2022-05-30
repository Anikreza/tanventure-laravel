@extends('master')
@section('content')
    <div class="section blog section-blg" style="background: linear-gradient(-40deg,#ffffff,#9f9f9f,#b6b3b3,#e8e7e7);">
        {{--    <div class="section blog section-blg">--}}
        {{--        @include('component.breadcrumb')--}}
        <div class="floatingTitle w3-animate-top">
            <h2>{{$article->title}}</h2>
            <br/>
            <p>{{$article->excerpt}}</p>
            <a onclick="scrollDown()" href="#reading" class="arrowDown"><i class='fas fa-angle-down'></i></a>
        </div>
        <div class="w3-animate-fading articleCover articleBlur">
            <img src="{{asset($article->image)}}" alt="">
        </div>

        {{--        <div class="container-blog">--}}
        <div class="col-lg-11 col-sm-12 customContainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="post post-full post-details">
                        <div class="post-entry d-sm-flex d-block align-items-start">
                            <div class="content-left d-flex">
                                <div class="post-date">
                                    <p style="font-size: 1.5rem">{{$article->created_at->translatedFormat('M')}} <strong
                                            style="font-weight: lighter; font-size: 1.5rem">'{{$article->created_at->translatedFormat('y')}}</strong>
                                    </p>
                                </div>
                                <ul class="social text-center  d-sm-none d-lg-block" style="font-size:1vh">
                                    @foreach($shareLinks as $key=>$link)
                                        <li><a href="{{$link}}" target="_blank" class="pin fab fa-{{$key}}"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="post-content post-content-wd">
                                <div class="post-meta d-block d-lg-flex align-items-center">
                                    <a href="{{route('about')}}">

                                        <div
                                            class="post-author d-flex align-items-center flex-shrink-0 align-self-start">
                                            <div>
                                                <img style="width: 6vh; height: 6vh; border-radius: 50%"
                                                     src="{{asset('assets/images/pp.jpg')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <p style="font-size: 1.9vh; color: #097349">তানভীর রেজা অনিক</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="post-tag  d-flex align-items-center" style="background: rgba(0,0,0,.1); width: fit-content; padding: 1px 2rem 1px 2rem">
                                        <ul class="post-cat" style="font-size:1.8vh">
                                            <li><a style="color: #1a0707" href="{{ route('category', ['slug' =>  $category->slug]) }}"><em
                                                        class="icon ti-bookmark"></em>
                                                    <span>{{ $category->name }}</span></a></li>
                                        </ul>
                                        <ul class="d-lg-none d-sm-block"><li><a style="font-size: 1.8vh; color: #210808">||  {{$article->created_at->translatedFormat('M')}} '{{$article->created_at->translatedFormat('y')}}</a></li></ul>

                                    </div>
                                </div>
                                <h3 style="font-size:3.6vh;color:#475E42FF; border-left: 20px solid #19b275; padding-left: 1rem; background: rgba(12,12,12,.1)">{{ $article['title'] }}</h3>
                                <hr/>
                                {{--                            mobile share--}}
                                <div class="d-md-flex  d-lg-none" style=" font-size:2vh;">
                                    <span class="label-primary">SHARE:</span>
                                    @foreach($shareLinks as $key=>$link)
                                        <a class="post-tag" target="_blank" href="{{$link}}">
                                <span
                                    style=" font-size:2vh; margin-left: 10px; background-color:#19b275; color: #ffffff; padding: 10px; border-radius: 5px"
                                    class=" post-tag pin fab fa-{{$key}}"
                                >
                                </span>
                                        </a>
                                    @endforeach
                                </div>
                                <br/>
                                <hr class="d-sm-block d-lg-none"/>
                                {{--                            mobile share--}}
                                <div class="content articleContent" style="text-align: justify; font-size: 2vh">
                                    {!! $article['description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- post -->
                    <!-- tags -->
                    <div style=" font-size:2vh;">
                        <br/>
                        <span class="label-primary">
                       TAGS:
                    </span>
                        @foreach($article->keywords as $keyword)
                            <a class="post-tag" href="{{ route('tag', ['slug' => \Str::slug($keyword->title)]) }}">
                                <span
                                    class="customTags">{{ $keyword->title }}</span>
                            </a>
                        @endforeach
                    </div>
                    <br/>
                    <br/>
                    <!-- tags -->
                    <hr/>
                    <!-- comments -->
                    <div class="d-lg-flex d-sm-block justify-content-evenly">
                    <div id="comments" class="wgs col-sm-12 col-lg-8 comments justify-center comments-list">
{{--                        @include('component.comments.index',['comments'=>$article->comments,'article'=>$article->id])--}}
                        @include('pages.articleDetail.partial.disquss')
                    </div>
                    <!-- comments -->
                    <!-- similar Posts -->
                    <div class="wgs">
                        <div class="section-head">
                            <h4 class="label-primary" style="font-weight: 500; font-size: 3vh">Related Posts</h4>
                        </div>
                        <div class="row gutter-vr-30px">
                            @foreach($similarArticles as $article)
                                <div class="col-12">
                                    <div class="post post-full post-v2 customSimilarPostContainer">
                                        @include('component.card.similarArticle',
                                               [
                                                   'time'=>$article['created_at'],
                                                   'image' => $article['image'],
                                                   'title' => $article['title'],
                                                   'slug' => $article['slug'],
                                                   'category' => $article['categories'][0],
                                               ])
                                    </div><!-- .post -->
                                </div><!-- .col -->
                            @endforeach
                        </div><!-- .row -->
                    </div><!-- .wgs -->
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('.articleCover').addClass('articleScrolled');
                } else {
                    $('.articleCover').removeClass('articleScrolled');
                }
            });
        });

        function scrollDown() {
            document.body.scrollTop = 100;
            document.documentElement.scrollTop = 100;
        }
    </script>
@endsection
