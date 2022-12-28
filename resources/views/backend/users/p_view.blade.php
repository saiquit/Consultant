@extends('layouts.backend.app')
@section('content')
    <div class="pd-20 mb-30">
        <div class="clearfix card-box pd-20 mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">{{ $profile->title . ' ' . $profile->first_name . ' ' . $profile->last_name }}</h4>
                <p class="mb-30 text-uppercase">Logged in as: <span
                        class="badge badge-success">{{ $profile->user->type }}</span></p>
            </div>
            <div class="pull-right">
                <a href="mailto:{{ $profile->user->email }}">
                    <button class="btn btn-info">Send an email</button>
                </a>
            </div>
        </div>
        <div class="row card-box pd-20 mb-30">
            <div class="col-sm-12 mb-20">
                <h1>Personal</h2>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Profile Image</h5>
                    <div class="card-body">
                        <img class="card-img-top" src="{{ url('/storage/profile/' . $profile->img) }}" alt="Card image cap">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Email</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->user->email }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Date of Birth</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->date_birth }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Short Bio</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->short_bio }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Phone</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->tel }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row card-box pd-20 mb-30">
            <div class="col-sm-12 mb-20">
                <h1>Profile</h2>
            </div>

            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Country</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->country }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">District</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->district }}</h5>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Address</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->address }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Gender</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->gender }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row card-box pd-20 mb-30">
            <div class="col-sm-12 mb-20">
                <h1>Career</h2>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Expertises</h5>
                    <div class="card-body">
                        @foreach ($profile->user->expertises as $expertise)
                            <span class="badge badge-info m-1">{{ $expertise->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Previous Organization</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->previous_organization }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Present Organization</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->present_organization }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Company Type</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->company_type }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Current Position</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->current_position }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Depertment</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->depertment }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-30">
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
