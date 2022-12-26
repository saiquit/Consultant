@extends('layouts.backend.app')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">{{ $profile->title . ' ' . $profile->first_name . ' ' . $profile->last_name }}</h4>
                <p class="mb-30 text-uppercase">Logged in as: {{ $profile->user->type }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Profile Image</h5>
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('f/assets/img/team/team_1.jpg') }}" alt="Card image cap">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Email</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->user->email }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Phone</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->tel }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Country</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->country }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">District</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->district }}</h5>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Address</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->address }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Date of Birth</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->date_birth }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Gender</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->gender }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Previous Organization</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->previous_organization }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Present Organization</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->present_organization }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Experience</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->experience }}</h5>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
