@extends('master')
@section('content')
    <div class="section blog section-x" style="background: linear-gradient(180deg,#759b6d,#ffffff,#f3fffb,#ffffff);">
        <div style="text-align: center">
            @include('component.breadcrumb')
            <div class="col col-md-12 col-sm-12 article-content animate__animated animate__fadeIn"
                 style="--animate-duration: 1500ms">
                <div class="columnist-row"></div>
                <div class="row" style="position: absolute; top: 1%; padding: 5rem 10rem 2rem 10rem">
                    {{--                    <div class="col col-md-4 col-12">--}}
                    {{--                        <img src="{{ asset('assets/images/tan2.jpg') }}"--}}
                    {{--                             alt="Tanvir Reza Anik">--}}
                    {{--                    </div>--}}
                    <div class=" col col-md-12 col-12 columnist-info">
                        <h2>ট্যানভেঞ্চার!!</h2>
                        <p style="color: #421a27" >
                            ট্যানকে যেবার প্রথম দেখেছিলাম, ওর সারা গায়ে ধুলো, কাদার ছোপ, ছন্নছাড়া এক ভংগি যেনো তার
                            চেহারায় গিল্টি করে দেয়া হয়েছে, ওর সাইকেলটা ঠেলে নিয়ে আফতাবনগরের একটা সাকো পার হচ্ছে, মুখে
                            লেগে আছে বোকার মত এক টুকরো হাসি, সর্বক্ষণ, চোখদুটোতে কি যেনো একটা অনুভুতি ফুটে আছে। ওই চোখে
                            কেউ ভালো করে তাকালে বুঝতে পারবে, আকাশপাতাল সব ভাবনারা তার মাথায় ঘোরে সারাক্ষণ, যা অনেকের
                            কাছেই বোধগম্য হবেনা, মনে হবে নিতান্ত কিশোরসুলভ বেয়াড়া ভাবনার দল বলে। আর ও সেসব ভাবনা সবাইকে
                            শোনাতেও খুব পছন্দ করতো। ওর সাথে কোনো এক উপলক্ষে কথা হয়েছিলো। ওই একবারই। তার বেশ কিছুদিন পর
                            জানতে পেরেছিলাম, বিশ বছর বয়েসী সেই যুবক তার ওই সাইকেলটা, যার নাম সে দিয়েছিলো 'আশা', তাকে
                            নিয়েই কোথায় যেনো হারিয়ে গেছে, বলে যায়নি সে কাউকেই, কিছু। পরিবারের একমাত্র ছেলে সে, সবে
                            বিশ্ববিদ্যালয়ের প্রথম বর্ষের ছাত্র। কি হয়েছিলো ট্যানের? আজ অবধি আমি ছাড়া আর কেউ জানতে পারেনি
                            তার কথা। ট্যানের সাথে আমার বন্ধুত্বটা অমন এক পর্যায়ে এসে দাড়িয়েছে গত তিন মাসে, সেদিন বিকেলের
                            পর থেকে, যেদিন আমি একটা উড়োচিঠি পেয়েছিলাম- উড়ো ইমেইল আসলে- যে ও আমাকে ভাই বলে ডেকেছে। ট্যান
                            যাকে ভাই সম্বোধন করে, তার সাথে ওর আত্মার সম্পর্ক, কখনোই তা ছিন্ন হবার নয়। আমি সে কথা জানি।
                            ট্যানকে আমি বাধ্য করেছি, ওর নিরন্তর যাত্রার সকল বর্ননা আমাকে লিখে পাঠাতে। ও রাজীও হয়েছে।
                            কিন্তু অদ্ভুত ছেলেটা ঠিক করেছে, কোনো ক্রমের ধার ধারবেনা সে, যখন যা ইচ্ছে করে, লিখে পাঠাবে।
                            আর হ্যা, ঠিক, আমি, তানভীর রেজা অনিক, মিস্টার ট্যানের অকৃত্তিম বন্ধু, ঠিক করেছি ওর যাত্রার
                            ইতিবৃত্ত জোড়াতালি দিয়ে একটা 'উপন্যাস' তৈরী করে ফেলবো। উপন্যাস শব্দের উপর আমার টান। উপন্যাস
                            শব্দের উপর আমার অনেক দুর্বলতা। দেখা ই যাক, কি ঘটতে চলেছে!
                        </p>
                    </div>
                </div>
            </div>
            <div class="customContainer">
                @foreach($novels as $key=> $novel)
                    <div
                        style="{{ $key%2===0? 'height: 10vh; margin: 2rem; text-align: left' : 'height: 10vh; margin: 2rem; text-align: right'  }}"
                    >
                        <p style="color:#475e42;">
                            ------------------------------------------------------------------------------------------------------------</p>

                        <a href="{{ route('article-details', ['slug' => $novel->slug]) }}">
                            <h2 style="color: #475e42">Tan's Stories</h2>
                        </a>
                        {{--                    <h2>{{$novel->title}}</h2>--}}
                        <p style="color:#475e42;">
                            ------------------------------------------------------------------------------------------------------------</p>

                    </div>
                    <div
                        style="{{ $key%2===0? 'display: flex; justify-content: space-evenly;' : 'display: flex; justify-content: space-evenly; flex-direction: row-reverse'  }}"
                    >
                        <div class="col col-md-6 col-12">
                            <p style="height: 40vh; overflow: hidden; color: #0a1108">
                                {{--                            {{$novel->description}}--}}
                                Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est
                                laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim
                                ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt
                                mollit anim id est laborum.
                            </p>
                            <a href="{{ route('article-details', ['slug' => $novel->slug]) }}"
                               class="btn-primary btn-arrow">Read More</a>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div>
                                <a href="{{ route('article-details', ['slug' => $novel->slug]) }}">
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

