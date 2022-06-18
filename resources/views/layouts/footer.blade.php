<!-- footer -->
<footer class="section footer tc-light-dark footer-s1">
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
                        <p style="color: #5e5e5e">&copy; 2022-{{ now()->year }}. {{trans('general.credit')}}</p>
                    </div>                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title"> {{trans('general.about')}}</h3>
                        <ul class="wgs-menu">
                            <li>
                                <a href="{{ url('author/8') }}">Columnist</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title">{{trans('general.services')}}</h3>
                        <ul class="wgs-menu">
                            @foreach($footerPages as $pageLink)
                                <li>
                                    <a href="{{ route('article-details', ['slug' => $pageLink['page']['slug'.'_'.app()->getLocale()]]) }}">{{ $pageLink['page']['title'.'_'.app()->getLocale()] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-md-auto">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title" >{{trans('general.subscribe')}}!</h3>
                        <p style="font-size: 1.3vh; text-align: center; color: #6c6c6c; margin-top: -1rem">{{trans('general.subscribeFoot')}}</p>
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
                                       style="border: 1px solid #858585"
                                       placeholder="Your  Email"
                                       required
                                >
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                <button type="submit"  class="fa fa-paper-plane button"></button>
                            </div>
                        </form>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</footer>

