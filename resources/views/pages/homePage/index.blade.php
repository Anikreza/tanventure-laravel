@extends('master')
@section('content')
    <div class='home'>
        @include('pages.homePage.partial.banner')

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000"
             data-pause="false">
            <div class="carousel-inner">
                @foreach($featuredPosts as $key=> $article)
                    @include('component.card.sliderCard',
                        [
                            'key' => $key,
                            'image' => $article['image'],
                            'title'=>$article['title'.'_'.app()->getLocale()],
                            'slug' => $article['slug'.'_'.app()->getLocale()],
                            'description' => $article['excerpt'.'_'.app()->getLocale()],
                            'category' => $category ?? $article['categories'][0],
                        ])
                @endforeach
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class='home-hr'>
            <div class='home-others'>
                @include('pages.homePage.partial.exploreSection')
                {{--            <div class="customHomeImageCenter"></div>--}}
                <div class="section section-l section-news customFeaturedSection">
                    @if(count($featuredPosts))
                        @include('pages.homePage.partial.slide',['featuredArticles'=>$featuredPosts])
                    @endif
                </div>
                <div class="sectionBanner2">
                    <h3 style="color: white">MEET TAN</h3>
                </div>
                <div class='home-im'></div>
                <div class='video'>
                    <div>
                        <h2>ট্যান...</h2>
                        _________________________________________________________________________

                        <p>ট্যানকে যেবার প্রথম দেখেছিলাম, ওর সারা গায়ে ধুলো, কাদার ছোপ, ছন্নছাড়া এক ভংগি যেনো তার
                            চেহারায় গিল্টি করে দেয়া হয়েছে, ওর সাইকেলটা ঠেলে নিয়ে আফতাবনগরের একটা সাকো পার হচ্ছে, মুখে
                            লেগে আছে বোকার মত এক টুকরো হাসি, সর্বক্ষণ, চোখদুটোতে কি যেনো একটা অনুভুতি ফুটে আছে। ওই চোখে
                            কেউ ভালো করে তাকালে বুঝতে পারবে, আকাশপাতাল সব ভাবনারা তার মাথায় ঘোরে সারাক্ষণ, যা অনেকের
                            কাছেই বোধগম্য হবেনা, মনে হবে নিতান্ত কিশোরসুলভ বেয়াড়া ভাবনার দল বলে। আর ও সেসব ভাবনা সবাইকে
                            শোনাতেও খুব পছন্দ করতো। ওর সাথে কোনো এক উপলক্ষে কথা হয়েছিলো। ওই একবারই। তার বেশ কিছুদিন পর
                            জানতে পেরেছিলাম, বিশ বছর বয়েসী সেই যুবক তার ওই সাইকেলটা, যার নাম সে দিয়েছিলো 'আশা', তাকে
                            নিয়েই কোথায় যেনো হারিয়ে গেছে, বলে যায়নি সে কাউকেই, কিছু। পরিবারের একমাত্র ছেলে সে, সবে
                            বিশ্ববিদ্যালয়ের প্রথম বর্ষের ছাত্র। কি হয়েছিলো ট্যানের?
                            আজ অবধি আমি ছাড়া আর কেউ জানতে পারেনি তার কথা। ট্যানের সাথে আমার বন্ধুত্বটা অমন এক পর্যায়ে
                            এসে দাড়িয়েছে গত তিন মাসে, সেদিন বিকেলের পর থেকে, যেদিন আমি একটা উড়োচিঠি পেয়েছিলাম- উড়ো ইমেইল
                            আসলে- যে ও আমাকে ভাই বলে ডেকেছে। ট্যান যাকে ভাই সম্বোধন করে, তার সাথে ওর আত্মার সম্পর্ক,
                            কখনোই তা ছিন্ন হবার নয়। আমি সে কথা জানি। ট্যানকে আমি বাধ্য করেছি, ওর নিরন্তর যাত্রার সকল
                            বর্ননা আমাকে লিখে পাঠাতে। ও রাজীও হয়েছে। কিন্তু অদ্ভুত ছেলেটা ঠিক করেছে, কোনো ক্রমের ধার
                            ধারবেনা সে, যখন যা ইচ্ছে করে, লিখে পাঠাবে। আর হ্যা, ঠিক, আমি, তানভীর রেজা অনিক, মিস্টার
                            ট্যানের অকৃত্তিম বন্ধু, ঠিক করেছি ওর যাত্রার ইতিবৃত্ত জোড়াতালি দিয়ে একটা 'উপন্যাস' তৈরী করে
                            ফেলবো। উপন্যাস শব্দের উপর আমার টান। উপন্যাস শব্দের উপর আমার অনেক দুর্বলতা। দেখা ই যাক, কি
                            ঘটতে চলেছে!</p>
                        {{--                </Link>--}}
                    </div>

                    <div>
                        <div class="wgs wgs-sidebar wgs-tags" style="margin-top: 50px">
                            {{--            <h3 class="wgs-heading">Tags</h3>--}}
                            <div class="wgs-content">
                                <ul class="tag-list">
                                    @foreach($tags as $tag)
                                        <li>
                                            <a href="{{ route('tag', ['slug' => \Str::slug($tag->title)]) }}">{{$tag->title}}</a>
                                        </li>
                                    @endforeach</ul>
                            </div>
                        </div><!-- .wgs -->

                    </div>

                </div>
            </div>
            <div class="section section-l section-news customMobileFeaturedSection d-lg-none">
                @if(count($featuredPosts))
                    @include('pages.landingPage.partial.featured',['featuredArticles'=>$featuredPosts, 'color'=>'whitesmoke'])
                @endif
            </div>
        </div>

@endsection

