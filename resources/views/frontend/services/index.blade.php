@extends('layouts.frontend.app')
@section('title')
    Services
@endsection
@section('content')
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="/f/assets/img/hero/services_hero.jpg"
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
    <div class="services-area">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <a href="{{ route('services.show', $service->slug) }}">
                            <div class="single-services text-center mb-30">
                                <div class="services-icon">
                                    <img src="@if ($service->icon) {{ url('/storage/service/icons/' . $service->icon) }} @else /f/assets/img/adapt_icon/1.png @endif"
                                        alt="" style="height: 50px; width: 50px" class=" mr-2">
                                </div>
                                <div class="services-caption">
                                    <h4>{{ $service->name }}</h4>
                                    <p>{{ Str::substr($service->about, 0, 100) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- services Area End-->
@endsection
