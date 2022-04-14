@extends('master')
@section('content')
    <div class="body-wider" style="background: linear-gradient(180deg,#ffffff,rgb(231,255,245),#ffffff);">
        @if(count($publishedArticles))
            @include('pages.landingPage.partial.topSection', ['articles' => $publishedArticles ])
        @endif

        @if(count($featuredArticles))
            @include('pages.landingPage.partial.featured',['featuredArticles'=>$featuredArticles, 'color'=>'inherit'])
        @endif

        @if(count($mostReadArticles))
            @include('pages.landingPage.partial.mostRead',['mostReadArticles'=>$mostReadArticles])
        @endif
    </div>
@endsection
