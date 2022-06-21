<!-- footer -->
<footer class="section footer tc-light-dark footer-s1">
    <div class="container">
        <div class="row gutter-vr-30px">

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <div class="wgs-logo">
                            <a href="/">
                                <img srcset="{{ asset('assets/images/logo-white.png') }}" alt="logo">
                            </a>
                        </div>
                        <p class="customFont">&copy; 2022-{{ now()->year }}. {{trans('general.credit')}}</p>
                    </div>                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title customFont"> {{trans('general.about')}}</h3>
                        <ul class="wgs-menu">
                            <li>
                                <a class="customFont" href="{{ url('author/8') }}">Columnist</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->

            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title customFont">{{trans('general.services')}}</h3>
                        <ul class="wgs-menu">
                            @foreach($footerPages as $pageLink)
                                <li>
                                    <a class="customFont" href="{{ route('article-details', ['slug' => $pageLink['page']['slug'.'_'.app()->getLocale()]]) }}">{{ $pageLink['page']['title'.'_'.app()->getLocale()] }}</a>
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
                                       class="input customFont"
                                       style="border: 1px solid #858585"
                                       placeholder={{trans('general.yourMail')}}
                                       required
                                >
                                <p style="font-size: 1.3vh; color: #6c6c6c; margin-top: -.5rem">{{trans('general.subscribeFoot')}}</p>
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

