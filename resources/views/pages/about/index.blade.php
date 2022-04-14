@extends('master')
@section('content')
    <div class="section blog section-x" style="background: linear-gradient(180deg,#ffffff,#ffffff,#a4b0ad,#ffffff);">
        <div class="customContainer" style="text-align: center">
            @include('component.breadcrumb')
            <div class="col col-md-12 col-sm-12 article-content animate__animated animate__fadeIn"
                 style="--animate-duration: 1500ms">
                <div class="row">
                    <div class="col col-md-4 col-12">
                        <img src="{{ asset('assets/images/tan2.jpg') }}"
                             alt="Tanvir Reza Anik">
                    </div>
                    <div class="col col-md-8 col-12 columnist-info" >
                        <h2>Tanvir Reza Anik</h2>
                        <p>
                            Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
            <div style="height: 10vh; margin: 2rem; text-align: left">
                ___________________________________________________________________

                <h2>Tan's Stories</h2>
                ___________________________________________________________________
            </div>
            <div style="display: flex; justify-content: space-evenly">
                <div class="col col-md-6 col-12">
                    <p> Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    </p>
                </div>

                <div class="col col-md-6 col-12">
                    <div>
                        <img src="{{ asset('assets/images/alt-banner-a.jpg') }}"
                             alt="Tanvir Reza Anik">
                    </div>
                </div>
            </div>

            <div style="height: 10vh; margin: 2rem; text-align: right">
                ___________________________________________________________________

                <h2>Tan's Journeys</h2>
                ___________________________________________________________________
            </div>
            <div style="display: flex; justify-content: space-evenly">

                <div class="col col-md-6 col-12">
                    <div>
                        <img src="{{ asset('assets/images/alt-banner-e.jpg') }}"
                             alt="Tanvir Reza Anik">
                    </div>
                </div>

                <div class="col col-md-6 col-12">
                    <p> Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

