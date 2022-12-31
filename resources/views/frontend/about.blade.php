@extends('layouts.frontend.app')
@section('title')
    About Us
@endsection
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center"
            data-background="/f/assets/img/hero/contact_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2 class="text-uppercase">About Xpertgoupbd</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- We Trusted Start-->
    <div class="we-trusted-area">
        <div class="container">
            <div class="row d-flex align-items-end">
                <div class="col-xl-12 col-lg-12">
                    <div class="trusted-caption">
                        {{-- <h2 class="text-uppercase"></h2> --}}
                        <p class="text-justify">Xpertgroupbd is the first & unique platform in Bangladesh for the purpose of
                            consulting in
                            manufacturing sector. We started our journey 2022 & dedicated platform to support small & medium
                            scale manufacturing industry.
                            our registerd expertise collaborate to address business risk & opportunity with providing any
                            technical support to the industries through onsite or offsite. We provide guidence to new
                            entrepreneurs planning to enter into the manufacturing industry by undertaking the complete
                            execution of the project.</p>
                        {{-- <a href="#" class="btn trusted-btn">Learn More</a> --}}
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="single-profile mb-30">
                        <!-- Back -->
                        <div class="single-profile-back-last">
                            <h2>What we do for you</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Support Primary research data (like market value, market leader
                                    & share % , Consumer perception data & Process cost etc.
                                </li>
                                <li class="list-group-item">New Product Development or modification
                                </li>
                                <li class="list-group-item">Assistance to proper machine selection , purchased & setup
                                </li>
                                <li class="list-group-item">Provide plant layout design & syncronize process
                                </li>
                                <li class="list-group-item">Machine breakdown maintenance/Repair ,OEE,TPM
                                </li>
                                <li class="list-group-item">Product related problem solving
                                </li>
                                <li class="list-group-item">Manpower efficiency improve training, manpower rationalization
                                </li>
                                <li class="list-group-item">Cost reduction project
                                </li>
                                <li class="list-group-item">Support Documentation & certification
                                </li>
                            </ul>
                            <a href="#">View profile »</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- We Trusted End-->
@endsection
