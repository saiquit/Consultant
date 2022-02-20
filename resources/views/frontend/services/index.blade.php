@extends('layouts.frontend.app')
@section('title')Services @endsection
@section('content')
<div class="single-slider slider-height2 d-flex align-items-center"
    data-background="/f/assets/img/hero/services_hero.jpg"
    style="background-image: url(/f/assets/img/hero/services_hero.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="hero-cap text-center section-tittle">
                    <h2 style="color: white !important">Our Services</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services Area Start-->
<div class="services-area pt-200">
    <div class="container">
        <!-- section tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center section-tittle">
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
                            <h4>{{$service->name}}</h4>
                            <p>{{Str::substr($service->about,0,20)}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- services Area End-->
<!-- Recent Area Start -->
<div class="recent-area section-paddingt">
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
</div>
<!-- Recent Area End-->

@endsection