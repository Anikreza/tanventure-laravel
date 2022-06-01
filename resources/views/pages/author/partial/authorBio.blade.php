<div class="d-lg-flex d-sm-block">
    <div class="col-lg-6 col-sm-12 d-lg-flex align-items-center align-content-center">
        <img src="{{ asset($author->image) }}"
             alt="{{$author->name}}" width="100%" style="border-top-left-radius: 50px">
    </div>
    <div class="col col-lg-6 col-sm-12 columnist-info align-content-center" style="font-size: 2.2vh">
        <h2 class="paddedHeader" style="margin-bottom: 1vh">{{$author->name}}</h2>
        {!! $author['bio'.'_'.app()->getLocale()] !!}
    </div>
</div>
