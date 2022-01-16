@extends('master')
@section('content')
    <body class="body-wider">
    <div class="section blog section-x tc-grey">
        <div class="container">
            @include('component.breadcrumb')
            <h5 style="color: #7e7777; margin-left: 15px; margin-bottom: 15px">Showing Posts With Tag : <span style="color: #ea5757"> {{ $tag->title}}</span></h5>
            <div class="row gutter-vr-30px">
                <div class="col-md-8">
                    @foreach($tagArticles as $article)
                        <div class="post post-full">
                            <div class="col-md-10">
                                <div class="post post-full post-details">
                                    @include('component.card.searchCard',
                                        [
                                            'image' => $article->image,
                                            'title' => $article->title,
                                            'slug' => $article->slug,
                                            'category' => $article['categories'][0]['name'],
                                            'description'=>$article['description']
                                        ])
                                </div>
                            </div>
                        </div><!-- .post -->
                    @endforeach
                </div><!-- .col -->

                <div class="col-md-8 order-md-last">
                    <div class="button-area pagination-area">
                        <ul class="pagination text-center text-md-right">
                            {{ $tagArticles->render("pagination::bootstrap-4") }}
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="col-md-4 pl-lg-4">
                       @include('component.card.sideBarCard',['tags'=>$tags,'header'=>'All Tags'])
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- end section/blog -->
    </body>
@endsection
