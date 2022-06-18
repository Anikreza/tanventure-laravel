@extends('layouts.master')
@section('content')
    <div class="section blog section-x   w3-animate-bottom">
        <div class="customContainer" style="text-align: center">
            @include('component.breadcrumb')
            @include('pages.author.partial.authorBio')
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

