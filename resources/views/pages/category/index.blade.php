@extends('master')
@section('content')
<body class="body-wider" style="background: linear-gradient(180deg,#ffffff,#cce0d0,#ffffff);">
<div class="section blog section-x tc-grey">
    <div style="margin:0 4rem 4rem 4rem">
        @include('component.breadcrumb')
        <div class="row gutter-vr-30px ">
                <div class="col-md-9">
                    @foreach($categoryArticles as $key=> $article)
                    <div class="post post-full">
                        <div class="col-md-12">
                            <div class="post post-full post-details">
                                @include('component.card.searchCard',
                                    [
                                        'key'=>$key,
                                        'image' => $article->image,
                                        'title' => $article->title,
                                        'slug' => $article->slug,
                                        'description' => $article->description,
                                        'category' => $category->name,
                                    ])
                            </div>
                        </div>
                    </div><!-- .post -->
                    @endforeach
                </div><!-- .col -->

            <div class="col-md-9 order-md-last">
                <div class="button-area pagination-area">
                    <ul class="pagination text-center text-md-right">
                        {{ $categoryArticles->render("pagination::bootstrap-4") }}
                    </ul>
                </div>
            </div>
            <div class="col-md-2 pl-lg-2 customLargeSidebar">
                @include('component.card.sideBarCard',['tags'=>$tags,'header'=>'Read Posts By Tag'])
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="col-md-2 pl-lg-2 customMobileSidebar">
            @include('component.card.sideBarCard',['tags'=>$tags,'header'=>'Read Posts By Tag'])
        </div><!-- .col -->
    </div><!-- .container -->
</div>
<!-- end section/blog -->
</body>
@endsection
