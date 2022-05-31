@extends('master')
@section('content')
    <div class="body-wider">
        @if(count($publishedArticles))
            @include('pages.landingPage.partial.topSection', ['articles' => $publishedArticles ])
        @endif
        @if(count($mostReadArticles))
            @include('pages.landingPage.partial.mostRead',['mostReadArticles'=>$mostReadArticles])
        @endif

        @if(count($featuredArticles))
            @include('pages.landingPage.partial.featured',['featuredArticles'=>$featuredArticles, 'color'=>'inherit'])
        @endif
    </div>
@endsection
