@extends('layouts.frontend.app')
@section('title')
    Home
@endsection

@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="f/assets/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8">
                            <div class="hero__caption">
                                <p data-animation="fadeInLeft" data-delay=".4s">Welcome to Xpertgroupbd</p>
                                <h1 data-animation="fadeInLeft" data-delay=".6s">We help you to grow your business
                                </h1>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                    <a href="{{ route('about') }}" class="btn hero-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="f/assets/img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8">
                            <div class="hero__caption">
                                <p data-animation="fadeInLeft" data-delay=".4s">Welcome to Xpertgroupbd</p>
                                <h1 data-animation="fadeInLeft" data-delay=".6s">We help you on your journey
                                </h1>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                    <a href="{{ route('about') }}" class="btn hero-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Team-profile Start -->
    <div class="team-profile team-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="single-profile mb-30">
                        <!-- Front -->
                        <div class="single-profile-front">
                            <div class="profile-img">
                                <img src="f/assets/img/team/team-1.jpg" alt="">
                            </div>
                            <div class="profile-caption">
                                <h4><a href="#">Our mission</a></h4>
                                <p>Our mission is to empower business decision makers through fast, accurate and
                                    personalized knowledge-sharing solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="single-profile mb-30">
                        <!-- Front -->
                        <div class="single-profile-front">
                            <div class="profile-img">
                                <img src="f/assets/img/team/team-2.jpg" alt="">
                            </div>
                            <div class="profile-caption">
                                <h4><a href="#">Benefits & compensation</a></h4>
                                <p>"For every succesfull project expertise will be paid as per company offerings.
                                    For a successful refereel you will be paid 20% from that project."
                                </p>
                            </div>
                        </div>
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
    <!-- Team-profile End-->

    <!-- services Area Start-->
    <div class="services-area section-padding2">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <a href="{{ route('services.show', $service->slug) }}">
                            <div class="single-services text-center mb-30">
                                <div class="services-icon">
                                    <span class="flaticon-checklist"></span>
                                </div>
                                <div class="services-caption">
                                    <h4>{{ $service->name }}</h4>
                                    <p>{{ Str::substr($service->about, 0, 20) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- button -->
            <div class="row justify-content-center">
                <div class="room-btn pt-50">
                    <a href="{{ route('services.index') }}" class="border-btn">More Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- services Area End-->

    <!-- We Trusted Start-->
    <div class="we-trusted-area ">
        <div class="container">
            <div class="row d-flex align-items-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="trusted-img">
                        <img src="f/assets/img/team/whyus.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="trusted-caption">
                        <h2>Why Xpertgroupbd</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Get the right expertise with less cost and faster
                                than traditional
                                consulting firms</li>
                            <li class="list-group-item bg-transparent">Easy payment system</li>
                            <li class="list-group-item bg-transparent">Quick decisions making with expert advice, knowledge,
                                and support
                                eliminate sudden & long time moving problems and pitfalls.</li>
                            <li class="list-group-item bg-transparent">Reduce Process Cost & process optimization</li>
                            <li class="list-group-item bg-transparent">Process automation & Reduce manpower</li>
                            <li class="list-group-item bg-transparent">Increase machine utilization & reduction of power
                                consumption
                            </li>
                            <li class="list-group-item bg-transparent">Machine breakdown maintenance</li>
                            <li class="list-group-item bg-transparent"></li>
                        </ul>
                        {{-- <a href="#" class="btn trusted-btn">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- We Trusted End-->

    <!-- Completed Cases Start -->
    {{-- <div class="completed-cases section-padding3">
        <div class="container-fluid">
            <div class="row">
                <!-- slider Heading -->
                <div class="col-xl-4 col-lg-4 col-md-8">
                    <div class="single-cases-info mb-30">
                        <h3>Completed Cases</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna ali
                            quUt enim ad minim veniam.
                            quis nostrud exercitation ullamco laboris
                            nierci si ut.</p>
                        <a href="gallery.html" class="border-btn border-btn2">See more</a>
                    </div>
                </div>
                <!-- OwL -->
                <div class="col-xl-8 col-lg-8 col-md-col-md-7">
                    <div class=" completed-active owl-carousel">
                        <div class="single-cases-img">
                            <img src="f/assets/img/service/completed_case_1.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap">
                                <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic mindshare whereas premium services.</p>
                                <span>Advisory</span>
                            </div>
                        </div>
                        <div class="single-cases-img">
                            <img src="f/assets/img/service/completed_case_2.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap">
                                <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic mindshare whereas premium services.</p>
                                <span>Advisory</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    <!-- Completed Cases end -->

    <!-- Testimonial Start -->
    {{-- <div class="testimonial-area fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial pt-65">
                            <!-- Testimonial tittle -->
                            <div class="testimonial-icon mb-45">
                                <img src="f/assets/img/logo/testimonial.png" class="ani-btn " alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption text-center">
                                <p>You can’t succeed if you just do what others do and
                                    follow the well-worn path. You need to create a new and
                                    original path for yourself. </p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="rattiong-caption">
                                    <span>Clifford Frazier<span> - Colorlib Themes</span> </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial pt-65">
                            <!-- Testimonial tittle -->
                            <div class="testimonial-icon mb-45">
                                <img src="f/assets/img/logo/testimonial.png" class="ani-btn" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption text-center">
                                <p>You can’t succeed if you just do what others do and
                                    follow the well-worn path. You need to create a new and
                                    original path for yourself. </p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="rattiong-caption">
                                    <span>Clifford Frazier<span> - Colorlib Themes</span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

    <!-- Recent Area Start -->
    {{-- <div class="recent-area section-paddingt">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2>Our Recent News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-recent-cap mb-30">
                        <div class="recent-img">
                            <img src="f/assets/img/recent/rcent_1.png" alt="">
                        </div>
                        <div class="recent-cap">
                            <span>Business planing</span>
                            <h4><a href="single-blog.html">Amazing Places To Visit In Summer</a></h4>
                            <p>Nov 30, 2020</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-recent-cap mb-30">
                        <div class="recent-img">
                            <img src="f/assets/img/recent/rcent_2.png" alt="">
                        </div>
                        <div class="recent-cap">
                            <span>Audit</span>
                            <h4><a href="single-blog.html">Amazing Places To Visit In Summer</a></h4>
                            <p>Nov 30, 2020</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-recent-cap mb-30">
                        <div class="recent-img">
                            <img src="f/assets/img/recent/rcent_3.png" alt="">
                        </div>
                        <div class="recent-cap">
                            <span>Business planing</span>
                            <h4><a href="single-blog.html">Amazing Places To Visit In Summer</a></h4>
                            <p>Nov 30, 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Recent Area End-->
@endsection
