@extends('layouts.master')
@section('content')
    <div class="section blog section-x">
        <div style="text-align: center">
            @include('component.breadcrumb')
            <div class="col col-md-12 col-sm-12 article-content w3-animate-zoom"
                 style="--animate-duration: 1500ms">
                <div class="columnist-row"></div>
                <div class="row" style="position: absolute; top: 1%; padding: 5rem 10rem 2rem 10rem">
                    {{--                    <div class="col col-md-4 col-12">--}}
                    {{--                        <img src="{{ asset('assets/images/tan2.jpg') }}"--}}
                    {{--                             alt="Tanvir Reza Anik">--}}
                    {{--                    </div>--}}
                    <div class=" col col-md-12 col-12 columnist-info">
                        <h2 style="text-transform: uppercase; font-family: Script; font-size: 5vh">
                            {{trans('general.tanventure')}}!!
                        </h2>
                        <p style="color: #dbefda; font-size: 2vh;">
                            {{trans('general.tanInfo')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="customContainer">
                @foreach($novels as $key=> $novel)
                    <br/>
                    <br/>
                    <br/>
                    <div
                        class="novelAnimation hidden"
                        style="{{ $key%2===0? 'height: 10vh; margin: 2rem; text-align: left' : 'height: 10vh; margin: 2rem; text-align: right'  }}"
                    >
                        <p style="color: #838383">
                            ------------------------------------------------------------------------------------------------------------</p>

                        <a href="{{ route('article-details', ['slug' => $novel['slug'.'_'.app()->getLocale()]]) }}">
                            <h2 style="color: #578667">{{$novel['title'.'_'.app()->getLocale()]}}</h2>
                        </a>
                        {{--                    <h2>{{$novel->title}}</h2>--}}
                        <p>
                            ------------------------------------------------------------------------------------------------------------</p>

                    </div>
                    <div
                        style="{{ $key%2===0? 'display: flex; justify-content: space-evenly;' : 'display: flex; justify-content: space-evenly; flex-direction: row-reverse'  }}"
                    >
                        <div class="col col-md-6 col-12 novelAnimation hidden">
                            <p style="height: 40vh; overflow: hidden; color: #838383">
                                {{$novel['excerpt'.'_'.app()->getLocale()]}}
                            </p>
                            <a href="{{ route('article-details', ['slug' => $novel['slug'.'_'.app()->getLocale()]]) }}"
                               class="btn-primary btn-arrow">Read More</a>
                        </div>
                        <div class="col col-md-6 col-12  novelAnimation hidden">
                            <div>
                                <a href="{{ route('article-details', ['slug' => $novel['slug'.'_'.app()->getLocale()]]) }}">
                                    <img src="{{$novel->image }}" alt="Tanvir Reza Anik"
                                         style="box-shadow: 4px 4px 4px 4px #3d3d3d">
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="col-md-9 order-md-last">
                <div class="button-area pagination-area">
                    <ul class="pagination text-center text-md-right">
                        {{ $novels->render("pagination::bootstrap-4") }}
                    </ul>
                </div>
            </div><!-- .col -->
        </div>
    </div>
    </div>
@endsection

