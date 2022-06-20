<div class="sidebar customSidebarWidth w3-animate-right">
    <div class="wgs wgs-sidebar wgs-tags">
        <h3 class="wgs-heading customFont" >{{$header}}</h3>
        <div class="wgs-content">
            <ul class="tag-list">
                @foreach($tags as $tag)
                    <li >
                        <a href="{{ route('tag', ['slug' => \Str::slug($tag->title)]) }}">{{$tag->title}}</a>
                    </li>
                @endforeach</ul>
        </div>
    </div><!-- .wgs -->
    <div class="wgs wgs-sidebar wgs-recents">
        <h3 class="wgs-heading customFont">Suggested Posts</h3>
        <div class="wgs-content">
            <ul class="post-recent">
                @foreach($featuredPosts as $article)
                    @include('component.card.sideBarFeatured',[
                            'title'=>$article['title'.'_'.app()->getLocale()],
                            'slug'=>$article['slug'.'_'.app()->getLocale()],
                        ])
                @endforeach
            </ul>
        </div>
    </div><!-- .wgs -->

    <div class="wgs wgs-sidebar bg-primary-after-transparency wgs-archive">
        <h3 class="wgs-heading customFont">Archives</h3>
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

</div><!-- .sidebar -->
