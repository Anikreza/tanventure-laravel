@extends('layouts.master')
@section('content')
    <div class="body-wider">
        @if(count($publishedArticles))
            @include('pages.blog.partial.topSection', ['articles' => $publishedArticles ])
        @endif
        @if(count($mostReadArticles))
            @include('pages.blog.partial.mostRead',['mostReadArticles'=>$mostReadArticles])
        @endif

        @if(count($featuredArticles))
            @include('pages.blog.partial.featured',['featuredArticles'=>$featuredArticles, 'color'=>'inherit'])
        @endif
    </div>
@endsection
