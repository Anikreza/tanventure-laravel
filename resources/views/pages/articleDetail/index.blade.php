@extends('layouts.master')
@section('content')
    {{--    <div class="section blog section-blg" style="background: linear-gradient(-40deg,#ffffff,#9f9f9f,#b6b3b3,#e8e7e7);" onclick="scrollDown()">--}}
    <div class="section blog section-blg">
        <div class="floatingTitle w3-animate-top" onclick="scrollDown()">
            <h2>{{$article['title'.'_'.app()->getLocale()]}}</h2>
            <br/>
            <p>{{$article['excerpt'.'_'.app()->getLocale()]}}</p>
            <a onclick="scrollDown()" href="#reading" class="arrowDown"><i class='fas fa-angle-down'></i></a>
        </div>
        <div class="w3-animate-fading articleCover articleBlur" onclick="scrollDown()">
            <img src="{{asset($article->image)}}" alt="">
        </div>
        <div class="col-lg-11 col-sm-12 customContainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="post post-full post-details">
                        @include('pages.articleDetail.partial.articleSection')
                    </div>
                @include('pages.articleDetail.partial.tags')
                <!-- post-bottom -->
                    <div class="d-lg-flex d-sm-block justify-content-evenly">
                        <div id="comments" class="wgs col-sm-12 col-lg-8 comments justify-center comments-list" style="margin-right: 50px">
                            {{--                        @include('component.comments.index',['comments'=>$article->comments,'article'=>$article->id])--}}
                            @include('pages.articleDetail.partial.disquss')
                        </div>
                        @include('pages.articleDetail.partial.relatedPosts')
                    </div>
                    <!-- post-bottom -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.articleCover').addClass('articleScrolled');
                } else {
                    $('.articleCover').removeClass('articleScrolled');
                }
            });
        });

        function scrollDown() {
            document.body.scrollTop = 150;
            document.documentElement.scrollTop = 150;
        }
    </script>
@endsection
