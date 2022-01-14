@extends('master')
@section('content')
    <body class="body-wider">
    <div class="section blog section-x tc-grey">
        <div class="container">
            <h4 style="color: grey">Query: {{$searchTerm}}</h4>
            <br/>
            <div class="row gutter-vr-30px">
                <div class="col-md-8">
                    @foreach($searchedArticles as $article)
                        <div class="post post-full">
                            <div class="col-md-10">
                                <div class="post post-full post-details">
                                    @include('component.card.categoryArticles',
                                        [
                                            'image' => $article->image,
                                            'title' => $article->title,
                                            'slug' => $article->slug,
                                            'excerpt' => $article->excerpt,
                                            'category' => $article->categories[0]->name,
                                        ])
                                </div>
                            </div>
                        </div><!-- .post -->
                    @endforeach
                </div><!-- .col -->

                <div class="col-md-8 order-md-last">
                    <div class="button-area pagination-area">
                        <ul class="pagination text-center text-md-right">
                            {{ $searchedArticles->render("pagination::bootstrap-4") }}
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="col-md-4 pl-lg-4">
                    <div class="sidebar">
                        <div class="wgs wgs-sidebar bg-secondary wgs-recents">
                            <h3 class="wgs-heading">Recent News</h3>
                            <div class="wgs-content">
                                <ul class="post-recent">
                                    <li>
                                        <h5><a href="dallas-news-details.html">Bringing Great Design Ideas To
                                                Completion </a></h5>
                                        <p class="post-tag">DECEMBER 12, 2018</p>
                                    </li>
                                    <li>
                                        <h5><a href="dallas-news-details.html">Highlights z UX Cambridge 2018 </a></h5>
                                        <p class="post-tag">DECEMBER 10, 2018</p>
                                    </li>
                                    <li>
                                        <h5><a href="dallas-news-details.html">Ladies, Wine & Design Hamburg #10: "New
                                                Tech" panel in our Werkhalle</a></h5>
                                        <p class="post-tag">DECEMBER 12, 2018</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .wgs -->
                        <div class="wgs wgs-sidebar bg-secondary wgs-archive">
                            <h3 class="wgs-heading">Archives</h3>
                            <div class="wgs-content">
                                <ul class="wgs-menu">
                                    <li><a href="#">December 2017 <span>(10)</span></a></li>
                                    <li><a href="#">November 2017 <span>(01)</span></a></li>
                                    <li><a href="#">Octobor 2017 <span>(17)</span></a></li>
                                    <li><a href="#">September <span>(05)</span></a></li>
                                    <li><a href="#">August <span>(40)</span></a></li>
                                </ul>
                            </div>
                        </div><!-- .wgs -->
                        <div class="wgs wgs-sidebar bg-secondary wgs-tags">
                            <h3 class="wgs-heading">Tags</h3>
                            <div class="wgs-content">
                                <ul class="tag-list">
                                    <li><a href="">Shipping</a></li>
                                    <li><a href="">Cargo</a></li>
                                    <li><a href="">Delivery</a></li>
                                    <li><a href="">Safe</a></li>
                                    <li><a href="">Fast</a></li>
                                    <li><a href="">sea</a></li>
                                </ul>
                            </div>
                        </div><!-- .wgs -->
                    </div><!-- .sidebar -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- end section/blog -->
    </body>
@endsection
