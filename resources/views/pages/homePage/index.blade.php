@extends('layouts.master')
@section('content')
    <div class='home w3-animate-top'>
        @include('pages.homePage.partial.banner')

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000"
             data-pause="false">
            <div class="carousel-inner w3-animate-zoom">
                @foreach($featuredPosts as $key=> $article)
                    @include('component.card.sliderCard',
                        [
                            'key' => $key,
                            'image' => $article['image'],
                            'title'=>$article['title'.'_'.app()->getLocale()],
                            'slug' => $article['slug'.'_'.app()->getLocale()],
                            'description' => $article['excerpt'.'_'.app()->getLocale()],
                            'category' => $category ?? $article['categories'][0],
                        ])
                @endforeach
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <i class="fa fa-caret-square-left" style="font-size: 2vw;" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <i class="fa fa-caret-square-right" style="font-size: 2vw;" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class='home-hr'>
            <div class='home-others'>
                <div class="container" style="transform: rotate(0deg)">
                    @include('pages.author.partial.authorBio')
                </div>
                <div>
                    @foreach($news as $id=> $info)
                        @include('component.card.newsCard',
                            [
                                'key'=>$id,
                                'title'=>$info['title'.'_'.app()->getLocale()],
                                'description' => $info['description'.'_'.app()->getLocale()],
                            ])
                    @endforeach
                </div>
                @include('pages.homePage.partial.exploreSection')
                <div class="section section-l section-news customFeaturedSection">
                    @if(count($featuredPosts))
                        @include('pages.homePage.partial.slide',['featuredArticles'=>$featuredPosts])
                    @endif
                </div>

                    @include('pages.homePage.partial.tan')
                @include('pages.author.partial.contactAuthor')
                <br/><br/><br/><br/>
            </div>
{{--            <div class="section section-l section-news customMobileFeaturedSection d-lg-none">--}}
{{--                @if(count($featuredPosts))--}}
{{--                    @include('pages.blog.partial.featured',['featuredArticles'=>$featuredPosts, 'color'=>'whitesmoke'])--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>

@endsection

