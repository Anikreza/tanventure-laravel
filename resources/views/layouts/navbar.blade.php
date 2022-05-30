<!-- Header -->
<header  id="header" class="has-fixed is-sticky is-shrink is-boxed header-s1" >
    <div class="header-box">
        <div class="header-main">
            <div class="header-wrap">
                <!-- Logo  -->
                <div class="header-logo logo">
                    <a href="{{ route('landingPage') }}" class="logo-link">
                        <img class="logo-white" src="{{asset("images/logo.png")}}" alt="logo">
                    </a>
                </div>

                <!-- Menu Toogle -->
                <div class="header-nav-toggle">
                    <a href="#" class="search search-mobile search-trigger"><i class="icon ti-search"></i></a>
                    <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                        <div class="toggle-line">
                            <span></span>
                        </div>
                    </a>
                </div>
                <!-- Menu Toogle -->

                <!-- Menu -->
                <div class="header-navbar">
                    <nav class="header-menu" id="header-menu">
                        <ul class="menu">
                            <li class="menu-item  has-sub">
                                <a
                                    class="nav-link @if(Request::url() == url('/blog')) active @endif"
                                    href="{{route('blog')}}">BLOG</a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a
                                    class="nav-link @if(Request::url() == url('/author')) active @endif"
                                    href="{{route('author',['slug' =>8])}}">ABOUT ME</a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a
                                    class="nav-link @if(Request::url() == url('/the-novel')) active @endif"
                                    href="{{route('novel')}}">The Novel</a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a class="menu-link nav-link active menu-toggle">BLOG CATEGORIES <i class="fa fa-caret-down"></i></a>
                                <ul class="menu-sub menu-drop">
                            @foreach($categories as $category)
                                        <li class="menu-item has-sub">
                                            <a
                                                class="nav-link @if(Request::url() == route('category', ['slug' => $category]) ) active @endif"
                                                aria-current="page"
                                                href="{{ route('category', ['slug' => $category]) }}">{{ strtoupper($category) }}
                                            </a>
                                        </li>
                            @endforeach
                                </ul>
                            </li>
                        </ul>
                        <ul class="menu-btns">
                            <li><a href="" class="btn search search-trigger"><i style="color: #475E42FF"
                                                                                class="icon ti-search "></i></a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- .header-navbar -->

                <!-- header-search -->
                <div class="header-search">
                    <form class="search-form" action="{{ route('search') }}">
                        <div class="search-group">
                            <input type="text" class="input-search" placeholder="Search.." name="query"
                                   required>
                            <button class="search-submit" type="submit"><i style="color: #475E42FF"
                                                                           class="icon ti-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- . header-search -->
            </div>
        </div>
    </div>
</header>
<!-- end header -->
