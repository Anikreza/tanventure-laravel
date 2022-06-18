@extends('layouts.master')
@section('content')
    <body  class="body-wider" style="background: linear-gradient(180deg,#ffffff,#ccd8e0,#ffffff);">
    <div class="section blog section-x tc-grey" >
        <div style="margin: 0 4rem 4rem 4rem">
            @include('component.breadcrumb')
            <h5 style="color: #655f5f; margin-left: 15px; margin-bottom: 15px">Showing Results For : <span style="color: #19b275"> {{ $searchTerm}}</span></h5>
            <div class="row gutter-vr-30px">
                <div class="col-md-9">
                    @foreach($searchedArticles as $key=> $article)
                        <div class="post post-full">
                            <div class="col-md-9">
                                <div class="post post-full post-details">
                                    @include('component.card.searchCard',
                                        [
                                            'key'=>$key,
                                            'image' => $article->image,
                                            'title' => $article['title'.'_'.app()->getLocale()],
                                            'slug' => $article['slug'.'_'.app()->getLocale()],
                                            'category' => $article['categories'][0]['name'.'_'.app()->getLocale()],
                                            'description'=>$article['description'.'_'.app()->getLocale()]
                                        ])
                                </div>
                            </div>
                        </div><!-- .post -->
                    @endforeach
                </div><!-- .col -->

                <div class="col-md-9 order-md-last">
                    <div class="button-area pagination-area">
                        <ul class="pagination text-center text-md-right">
                            {{ $searchedArticles->render("pagination::bootstrap-4") }}
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="col-md-2 pl-lg-2">
                    @include('component.card.sideBarCard',['tags'=>$tags,'header'=>'All Tags'])
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- end section/blog -->
    </body>
@endsection
