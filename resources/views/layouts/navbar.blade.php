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
                                    href="{{route('blog')}}"> {{ __('navbar.blog') }}</a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a
                                    class="nav-link @if(Request::url() == url('/author')) active @endif"
                                    href="{{route('author',['slug' =>8])}}">{{ __('navbar.aboutMe') }}</a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a
                                    class="nav-link @if(Request::url() == url('/the-novel')) active @endif"
                                    href="{{route('novel')}}">{{ __('navbar.novel') }}</a>
                            </li>
{{--                            @foreach($footerPages as $pageLink)--}}
{{--                                <li class="menu-item  has-sub">--}}
{{--                                    <a style="color: #475e42" href="{{ route('article-details', ['slug' => $pageLink['page']['slug']]) }}">{{ $pageLink['page']['title'] }}</a>--}}

{{--                                </li>--}}
{{--                            @endforeach--}}
                            <li class="menu-item  has-sub">
                                <a class="menu-link nav-link active menu-toggle">{{ __('navbar.category') }} <i class="fa fa-caret-down"></i></a>
                                <ul class="menu-sub menu-drop">
                            @foreach($categories as $category)
                                        <li class="menu-item has-sub">
                                            <a
                                                class="nav-link @if(Request::url() == route('category', ['slug' => $category['name'.'_'.app()->getLocale()]]) ) active @endif"
                                                aria-current="page"
                                                href="{{ route('category', ['slug' => $category['name'.'_'.app()->getLocale()]]) }}">{{ strtoupper($category['name'.'_'.app()->getLocale()]) }}
                                            </a>
                                        </li>
                            @endforeach
                                </ul>
                            </li>
                            @include('component.languageSwitcher')
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
