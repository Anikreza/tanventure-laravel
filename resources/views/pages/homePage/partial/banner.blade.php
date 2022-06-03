<div class="homeBannerContainer">
{{--    @foreach($featuredPosts as $key=> $article)--}}
{{--        <div class="img-container-home">--}}
{{--            <a href="articles/asia" target="_blank">--}}
{{--                <img class="img" src="{{asset($article['image'])}}">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    @endforeach--}}
    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/l.jpg')}}">
    </div>
    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/6.png')}}">
    </div>
    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/3.png')}}">
    </div>

    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/7.png')}}">
    </div>

    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/0.png')}}">
    </div>

    <div class="img-container-home">
        <img class="img" src="{{asset('assets/images/2.png')}}">
    </div>
    <div class="img-container-home ">
        <img class="img" src="{{asset('assets/images/k.jpg')}}">
    </div>
</div>

<div>
    <p style="font-size: 1.3vh;letter-spacing: .1rem;text-align: center; text-transform: capitalize; color: #0d6b45"
       class="align-items-center w3-animate-left">
        {{trans('general.wayISeeIt')}}
    </p>
    <h1 style="font-size: 5vh; width: fit-content; margin:auto;  background-color: #cfe7dc; letter-spacing: 1rem;text-align: center; text-transform: uppercase; font-family: 'Script'" class="align-items-center  w3-animate-fading-infinite" >
        {{ __('general.tanventure') }}
    </h1>
    <div class="homeIntro">
        <div class="homeIntroLayer">
        <p class="align-items-center w3-animate-changeColor">
            {{ __('general.iAm') }}
        </p>
        <p class="align-items-center  w3-animate-changeColor">
            {{ __('general.anotherStory') }}
        </p>
        <p class="align-items-center w3-animate-changeColor">
            {{ __('general.letMe') }}
        </p>
        </div>
    </div>

    <hr/>
</div>

