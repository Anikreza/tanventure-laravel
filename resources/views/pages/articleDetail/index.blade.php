@extends('master')
@include('layouts.navbar')
<div class="section blog section-x">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="post post-full post-details">
                    <div class="post-thumb">
                        <img src="images/post-thumb-md-a.jpg" alt="">
                    </div>
                    <div class="post-entry d-sm-flex d-block align-items-start">
                        <div class="content-left d-flex d-sm-block">
                            <div class="post-date">
                                <p>Mar <strong>19</strong></p>
                            </div>
                            <ul class="social text-center">
                                <li><a href="" class="fac fab fa-facebook-f"></a></li>
                                <li><a href="" class="twi fab fa-twitter"></a></li>
                                <li><a href="" class="pin fab fa-pinterest-p"></a></li>
                                <li><a href="" class="goo fab fa-google-plus-g"></a></li>
                            </ul>
                        </div>
                        <div class="post-content post-content-wd">
                            <div class="post-meta d-block d-lg-flex align-items-center">
                                <div class="post-author d-flex align-items-center flex-shrink-0 align-self-start">
                                    <div class="author-thumb">
                                        <img src="images/author-image-a.jpg" alt="">
                                    </div>
                                    <div class="author-name">
                                        <p>Mark Anthony</p>
                                    </div>
                                </div>
                                <div class="post-tag d-flex">
                                    <ul class="post-cat">
                                        <li><a href="#"><em class="icon ti-bookmark"></em> <span>Design , UI / UX</span></a></li>
                                    </ul>
                                    <ul class="post-cat flex-shrink-0">
                                        <li><a href="#"><em class="icon ti-comment"></em><span> 2 Comments</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3>One of the Best UX Agencies in the World</h3>
                            <div class="content">
                                <p>The Demodern team is responsible for the diverse solutions of the individual applications, the overall staging and conception of the 'Discovery Dock. exercitation ullamco laboris nisi ut aliquip ex ea commodo.On the other hand we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound.</p>
                                <p class="block-text"><em>On the other hand we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire that they cannot foresee the pain.</em></p>
                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo.On the other hand we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .post -->
                <div class="wgs">
                    <div class="section-head">
                        <h3 class="wgs-heading mb-10">Releted Posts</h3>
                    </div>
                    <div class="row gutter-vr-30px">
                        <div class="col-12 col-lg-6">
                            <div class="post post-full post-v2">
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="images/post-thumb-md-c.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-entry bg-secondary d-sm-flex d-block align-items-start">
                                    <div class="post-date">
                                        <p>Mar <strong>19</strong></p>
                                    </div>
                                    <div class="post-content post-content-s2">
                                        <div class="post-meta d-flex align-items-center">
                                            <div class="post-author d-flex align-items-center">
                                                <div class="author-thumb">
                                                    <img src="images/author-image-a.jpg" alt="">
                                                </div>
                                                <div class="author-name">
                                                    <p>Mark Anthony</p>
                                                </div>
                                            </div><!-- author -->
                                            <div class="post-tag">
                                                <ul class="post-cat">
                                                    <li><a href="#"><em class="icon ti-bookmark"></em> <span>Marketing</span></a></li>
                                                </ul>
                                            </div><!-- .post-tag -->
                                        </div>
                                        <h4><a href="#">The All-New Mazda3: Demodern develops 3D Car Configurator</a></h4>
                                    </div>
                                </div>
                            </div><!-- .post -->
                        </div><!-- .col -->
                        <div class="col-12 col-lg-6">
                            <div class="post post-full post-v2">
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="images/post-thumb-md-b.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-entry bg-secondary d-sm-flex d-block align-items-start">
                                    <div class="post-date">
                                        <p>Mar <strong>11</strong></p>
                                    </div>
                                    <div class="post-content post-content-s2">
                                        <div class="post-meta d-flex align-items-center">
                                            <div class="post-author d-flex align-items-center">
                                                <div class="author-thumb">
                                                    <img src="images/author-image-c.jpg" alt="">
                                                </div>
                                                <div class="author-name">
                                                    <p>Mark Anthony</p>
                                                </div>
                                            </div><!-- author -->
                                            <div class="post-tag">
                                                <ul class="post-cat">
                                                    <li><a href="#"><em class="icon ti-bookmark"></em> <span>Design</span></a></li>
                                                </ul>
                                            </div><!-- .post-tag -->
                                        </div>
                                        <h4><a href="#">In spring DuMont opens a mixed reality for the Port of Hamburg</a></h4>
                                    </div>
                                </div>
                            </div><!-- .post -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .wgs -->
{{--                <div class="wgs comments fw-3">--}}
{{--                    <div class="row gutter-vr-30px">--}}
{{--                        <div class="col-12 col-lg-6">--}}
{{--                            <h3 class="wgs-heading mb-0">Comments</h3>--}}
{{--                            <ul class="comments-list">--}}
{{--                                <li class="comments-row">--}}
{{--                                    <div class="media">--}}
{{--                                        <img src="images/user-thumb-a.jpg" alt="">--}}
{{--                                        <div class="media-body">--}}
{{--                                            <div class="comment-content">--}}
{{--                                                <p class="media-name"><strong> Mark Anthony</strong>  <span class="post-date">- 21 March </span> </p>--}}
{{--                                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo.On the other hand we denounce with righteous indignation and dislike men.</p>--}}
{{--                                                <a href="">Reply</a>--}}
{{--                                            </div>--}}
{{--                                            <!-- .comment -->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <ul class="comments-list">--}}
{{--                                        <li class="comments-row">--}}
{{--                                            <div class="media">--}}
{{--                                                <img src="images/user-thumb-b.jpg" alt="">--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="comment-content">--}}
{{--                                                        <p class="media-name"><strong>Roger Helder</strong>   <span class="post-date">- 21 March </span> </p>--}}
{{--                                                        <p>We denounce with righteous indignation and dislike men who are so beguiled.</p>--}}
{{--                                                        <a href="">Reply</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="comments-row">--}}
{{--                                    <div class="media">--}}
{{--                                        <img src="images/user-thumb-a.jpg" alt="">--}}
{{--                                        <div class="comment-content media-body">--}}
{{--                                            <p class="media-name"><strong> Mark Anthony</strong>  <span class="post-date">- 21 March </span> </p>--}}
{{--                                            <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo.On the other hand we denounce with righteous indignation and dislike.</p>--}}
{{--                                            <a href="">Reply</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div><!-- .col -->--}}
{{--                        <div class="col-12 col-lg-6">--}}
{{--                            <div class="comments-form comments-form-visible mt-0 pl-2rem">--}}
{{--                                <div class="text-block form-text">--}}
{{--                                    <h3 class="wgs-heading mb-10">Leave a Reply</h3>--}}
{{--                                    <p><em>Your email address will not be published. Required fields are marked <span class="tc-primary">*</span></em></p>--}}
{{--                                </div>--}}
{{--                                <form action="#" method="POST">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="form-field col-md-6">--}}
{{--                                            <input type="text" placeholder="Your Name" class="input" aria-required="true">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-field col-md-6">--}}
{{--                                            <input type="email" placeholder="Your Email" class="input">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="form-field col-md-12">--}}
{{--                                            <input type="text" placeholder="Your Website" class="input" aria-required="true">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="form-field col-md-12">--}}
{{--                                            <textarea placeholder="Add Comment" class="input input-msg" aria-required="true"></textarea>--}}
{{--                                            <button type="submit" class="btn">Post Comment</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div><!-- .comment-form -->--}}
{{--                        </div><!-- .col -->--}}
{{--                    </div><!-- .row -->--}}
{{--                </div>--}}
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>
