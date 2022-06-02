<!-- footer -->
<footer class="section footer tc-light-dark footer-s1" style="background: linear-gradient(180deg,#ffffff,#1d2f21);">
    <div class="container">
        <div class="row gutter-vr-30px">

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <div class="wgs-logo">
                            <a href="/">
                                <img srcset="{{ asset('assets/images/logo.png') }}" alt="logo">
                            </a>
                        </div>
                        <p>&copy; 2022. All rights reserved</p>
                    </div>                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title"> ABOUT</h3>
                        <ul class="wgs-menu">
                            <a style="color: #475e42" href="{{ url('author/8') }}">Columnist</a>
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title">SERVICES</h3>
                        <ul class="wgs-menu">
                            @foreach($footerPages as $pageLink)
                                <a style="color: #475e42" href="{{ route('article-details', ['slug' => $pageLink['page']['slug'.'_'.app()->getLocale()]]) }}">{{ $pageLink['page']['title'.'_'.app()->getLocale()] }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-md-auto">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title">SUBSCRIBE TANVENTURE!</h3>
                        <form action="{{route('newsLetter')}}" method="POST">
                            @csrf
                            <div class="form-results">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="field-group btn-inline">
                                <input name="email"
                                       type="email"
                                       id="'email"
                                       class="input"
                                       placeholder="Your  Email"
                                       required
                                >
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                <button type="submit"  class="far fa-paper-plane button"></button>
                            </div>
                        </form>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</footer>

