@extends('layouts.frontend.app')
@section('title')
    {{ $service->name }}
@endsection
@section('content')
    <section class="services-details">
        <div class="container pt-50 pb-80">
            <div class="row">
                <div class="col-md-12">
                    <div class=" text-left pt-20 pb-10">
                        <h1 class="pb-10">Bangladesh's Top {{ $service->name }} Consultants Under One Roof</h1>
                        <p><span class="">Connect with trusted and verified <b> {{ $service->name }}
                                    consultants</b>
                                in the country</span></p>
                    </div>
                    <div class="row">
                        <div class="col-4 center">
                            <h2>{{ $service->projects->count() }}</h2>
                            <p class="">{{ $service->name }} Total Projects</p>
                        </div>
                        <div class="col-4 center">
                            <h2>{{ $applied_user_count }}</h2>
                            <p class="">Expertise Applied </p>
                        </div>
                        {{-- <div class="col-4 center">
                            <h2>800+</h2>
                            <p class="text-white">{{ $service->name }}</p>
                        </div> --}}
                    </div>
                    <div>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <section class="mt-100 mb-100">
        <div class="container">
            <div class="row pb-10">
                <h2>About Chemical Consultants from SolutionBuggy</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{ $service->about }}</p>
                </div>
                @if ($service->subitems != null)
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush about_list">
                            @foreach (explode(',', $service->subitems) as $item)
                                <li class="list-group-item ">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
