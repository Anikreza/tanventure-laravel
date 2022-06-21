@extends('layouts.master')
@section('content')
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="imageRow">
            <div class="imageColumn">
                <img src="{{asset('images/5.jpg')}}" onclick="openModal();currentSlide(1)" class="hover-shadow">
            </div>
            <div class="imageColumn">
                <img src="{{asset('images/a.jpg')}}" onclick="openModal();currentSlide(2)" class="hover-shadow">
            </div>
            <div class="imageColumn">
                <img src="{{asset('images/alt-banner-a.jpg')}}" onclick="openModal();currentSlide(3)" class="hover-shadow">
            </div>
            <div class="imageColumn">
                <img src="{{asset('images/aaa.jpg')}}" onclick="openModal();currentSlide(4)" class="hover-shadow">
            </div>
        </div>

        <!-- The Modal/Lightbox -->
        <div id="galerryModal" class="imageModal">

            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="image-modal-content">
                <div class="imageMySlides">
                    <div class="imageNumbertext">1 / 4</div>
                    <img src="{{asset('images/5.jpg')}}" style="width:100%">
                </div>

                <div class="imageMySlides">
                    <div class="imageNumbertext">2 / 4</div>
                    <img src="{{asset('images/a.jpg')}}" style="width:100%">
                </div>

                <div class="imageMySlides">
                    <div class="imageNumbertext">3 / 4</div>
                    <img src="{{asset('images/alt-banner-a.jpg')}}" style="width:100%">
                </div>

                <div class="imageMySlides">
                    <div class="imageNumbertext">4 / 4</div>
                    <img src="{{asset('images/aaa.jpg')}}" style="width:100%">
                </div>

                <!-- Next/previous controls -->
                <a class="imagePrev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="imageNext" onclick="plusSlides(1)">&#10095;</a>

                <!-- Caption text -->
                <div class="image-caption-container">
                    <p id="caption">caption is here</p>
                </div>

                <!-- Thumbnail image controls -->
                <div class="imageColumn">
                    <img class="imageDemo" src="{{asset('images/alt-banner-a.jpg')}}" onclick="currentSlide(1)" alt="Nature">
                </div>

                <div class="imageColumn">
                    <img class="imageDemo" src="{{asset('images/alt-banner-a.jpg')}}" onclick="currentSlide(2)" alt="Snow">
                </div>

                <div class="imageColumn">
                    <img class="imageDemo" src="{{asset('images/alt-banner-a.jpg')}}" onclick="currentSlide(3)" alt="Mountains">
                </div>

                <div class="imageColumn">
                    <img class="imageDemo" src="{{asset('images/alt-banner-a.jpg')}}" onclick="currentSlide(4)" alt="Lights">
                </div>
            </div>
        </div>

    <script>
        // Open the Modal
        function openModal() {
            document.getElementById("galerryModal").style.display = "block";
        }

        // Close the Modal
        function closeModal() {
            document.getElementById("galerryModal").style.display = "none";
        }

        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            const slides = document.getElementsByClassName("imageMySlides");
            const dots = document.getElementsByClassName("imageDemo");
            const captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
@endsection




