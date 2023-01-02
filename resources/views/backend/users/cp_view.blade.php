@extends('layouts.backend.app')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">{{ $profile->c_name }}</h4>
                <p class="mb-30 text-uppercase">Logged in as: {{ $profile->user->type }}</p>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Profile Image</h5>
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('f/assets/img/team/team_1.jpg') }}" alt="Card image cap">
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Phone</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->tel }}</h5>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Country</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->country }}</h5>
                    </div>
                </div>
            </div> --}}

            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Email</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->c_email }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Address</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->c_address }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Type</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ App\Models\Service::find($profile->type)->first()->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card card-box">
                    <h5 class="card-header weight-500">Contact Person</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->contact_person }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
