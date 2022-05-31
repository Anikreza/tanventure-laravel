@extends('master')
@section('content')
    <div class="section blog section-x   w3-animate-bottom"
         style="background: linear-gradient(180deg,#ffffff,#ffffff,#a4b0ad,#ffffff);">
        <div class="customContainer" style="text-align: center">
            @include('component.breadcrumb')
            <div class="">
                <div class="d-lg-flex d-sm-block">
                    <div class="col-lg-6 col-sm-12 d-lg-flex align-items-center align-content-center">
                        <img src="{{ asset($author->image) }}"
                             alt="{{$author->name}}" width="90%" style="border-top-left-radius: 50px">
                    </div>
                    <div class="col col-lg-6 col-sm-12 columnist-info align-content-center" style="font-size: 2.2vh">
                        <h2 class="paddedHeader">{{$author->name}}</h2>
                        {!! $author['bio'.'_'.app()->getLocale()] !!}
                    </div>
                </div>
            </div>
            @include('pages.author.partial.contactAuthor')
            <br/>
            <br/>
            @include('pages.author.partial.aboutAuthor')
            <br/>
            <br/>
            @include('pages.author.partial.authorPosts')
            <br/>
            <br/>
        </div>
    </div>
@endsection

