@extends('master')
@section('content')
    <div class="section blog section-blg" style="background: linear-gradient(-40deg,#ffffff,#9f9f9f,#b6b3b3,#e8e7e7);">
{{--    <div class="section blog section-blg">--}}
        {{--        @include('component.breadcrumb')--}}
        <div class="article-thumb">
            <img src="{{asset($article->image)}}" alt="">
        </div>
        {{--        <div class="container-blog">--}}
        <div class="customContainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="post post-full post-details">
                        <div class="post-entry d-sm-flex d-block align-items-start">
                            <div class="content-left d-flex d-sm-block">
                                <div class="post-date">
                                    <p>{{$article->created_at->translatedFormat('M')}} <strong
                                            style="font-weight: lighter">'{{$article->created_at->translatedFormat('y')}}</strong>
                                    </p>
                                </div>
                                <ul class="social text-center">
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
                                            <div class="author-thumb">
                                                <img src="{{asset('assets/images/pp.jpg')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <p style="color: #231111">তানভীর রেজা অনিক</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="post-tag d-flex">
                                        <ul class="post-cat">
                                            <li><a href="{{ route('category', ['slug' =>  $category->slug]) }}"><em
                                                        class="icon ti-bookmark"></em>
                                                    <span>{{ $category->name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 style="color:#475E42FF;">{{ $article['title'] }}</h3>
                                <hr/>
                                <div class="content" style="text-align: justify">
                                    {!! $article['description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post -->
                    <!-- tags -->
                    <div>
                    <span class="label-primary">
                       TAGS:
                    </span>
                        @foreach($article->keywords as $keyword)
                            <a class="post-tag" href="{{ route('tag', ['slug' => \Str::slug($keyword->title)]) }}">
                                <span
                                    style=" font-size:16px; margin-left: 10px; background-color:#19b275; color: #ffffff; padding: 10px; border-radius: 5px">{{ $keyword->title }}</span>
                            </a>
                        @endforeach
                    </div>
                    <br/>
                    <br/>
                    <!-- tags -->
                    <hr/>
                    <!-- comments -->
                    <div id="comments">
                        @include('component.comments.index',['comments'=>$article->comments,'article'=>$article->id])
                    </div>
                <!-- comments -->
                    <!-- similar Posts -->
                    <div class="wgs">
                        <div class="section-head">
                            <h4 class="label-primary" style="font-weight: 500">Related Posts</h4>
                        </div>
                        <div class="row gutter-vr-30px ">
                            @foreach($similarArticles as $article)
                                <div class="col-12 col-lg-6">
                                    <div class="post post-full post-v2">
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
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
@endsection
