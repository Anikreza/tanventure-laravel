@extends('layouts.master')
@section('content')
    <body  class="body-wider">
    <div class="section blog section-x tc-grey" >
        <div class="customCategoryPage">
            @include('component.breadcrumb')
            @if(count($searchedArticles))
            <h5 class="customFont" style=" margin-left: 15px; margin-bottom: 15px">Showing Results For : <span style="color: #19b275"> {{ $searchTerm}}</span></h5>
            @endif
          <br/>
            <div class="row gutter-vr-30px">
                <div class="col-md-9">
                    @if(count($searchedArticles))
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
                        @else
                            @include('component.noResults')
                   @endif
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
