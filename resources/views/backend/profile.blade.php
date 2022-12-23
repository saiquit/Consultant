@php
    $user = auth()->user();
@endphp
@push('css')
    <link rel="stylesheet" href="{{ asset('b/vendors/styles/imageuploadify.min.css') }}">
@endpush
@extends('layouts.backend.app')
@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Profile</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <div class="profile-photo">
                        <form action="{{ route('admin.profile_img') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                    class="fa fa-pencil"></i></a>
                            {{-- <img src="@if ($profile->img) {{ url('/storage/profile/' . $profile->img) }}
                        @else
                        /b/vendors/images/photo1.jpg @endif"
                                alt="" class="avatar-photo"> --}}
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                {{-- <img id="image" src="/b/vendors/images/photo2.jpg" alt="Picture"> --}}
                                                {{-- <input placeholder="Upload Image" type="file" name="img"
                                                class="custom-file-input" id="profile-image"> --}}
                                                <input name="img" type="file" accept=".jpg,.jpeg,.png">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h5 class="text-center h5 mb-0 text-capitalize">ID: {{ $user->id }}</h5>
                    <h5 class="text-center h5 mb-0 text-capitalize">Name: {{ $user->name }}</h5>
                    <p class="text-center text-muted font-14 text-capitalize">Logged in as: {{ $user->type }}</p>
                    <div class="profile-info">
                        <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                        <ul>
                            <li>
                                <span>Email Address:</span>
                                {{ $user->email }}
                            </li>
                            <li>
                                <span>Phone Number:</span>
                                {{ $user->profile->tel ?? $user->company_profile->tel }}
                            </li>
                            <li>
                                <span>Country:</span>
                                {{ $user->profile->country ?? $user->company_profile->country }}
                            </li>
                            <li>
                                <span>Address:</span>
                                {{ $user->profile->address ?? $user->company_profile->address }}
                            </li>
                        </ul>
                    </div>
                    <div class="profile-social">
                        <h5 class="mb-20 h5 text-blue">Social Links</h5>
                        <ul class="clearfix">
                            <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i
                                        class="fa fa-dribbble"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i
                                        class="fa fa-dropbox"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i
                                        class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i
                                        class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i
                                        class="fa fa-skype"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i
                                        class="fa fa-vine"></i></a></li>
                        </ul>
                    </div>
                    {{-- <div class="profile-skills">
                    <h5 class="mb-20 h5 text-blue">Key Skills</h5>
                    <h6 class="mb-5 font-14">HTML</h6>
                    <div class="progress mb-20" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="mb-5 font-14">Css</h6>
                    <div class="progress mb-20" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="mb-5 font-14">jQuery</h6>
                    <div class="progress mb-20" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="mb-5 font-14">Bootstrap</h6>
                    <div class="progress mb-20" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> --}}
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="card-box height-100-p overflow-hidden">
                    <div class="profile-tab height-100-p">
                        <div class="tab height-100-p">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                {{-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                            </li> --}}
                                @if (auth()->user()->type == 'expert')
                                    <li class="nav-item">
                                        <a class="nav-link  active " data-toggle="tab" href="#tasks"
                                            role="tab">Tasks</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link @if (auth()->user()->type != 'expert') active @endif" data-toggle="tab"
                                        href="#setting" role="tab">Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <!-- Timeline Tab start -->
                                {{-- <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                <div class="pd-20">
                                    <div class="profile-timeline">
                                        <div class="timeline-month">
                                            <h5>August, 2020</h5>
                                        </div>
                                        <div class="profile-timeline-list">
                                            <ul>
                                                <li>
                                                    <div class="date">12 Aug</div>
                                                    <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                        Added</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 Aug</div>
                                                    <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 Aug</div>
                                                    <div class="task-name"><i class="ion-ios-clock"></i> Event Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 Aug</div>
                                                    <div class="task-name"><i class="ion-ios-clock"></i> Event Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-month">
                                            <h5>July, 2020</h5>
                                        </div>
                                        <div class="profile-timeline-list">
                                            <ul>
                                                <li>
                                                    <div class="date">12 July</div>
                                                    <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                        Added</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 July</div>
                                                    <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-month">
                                            <h5>June, 2020</h5>
                                        </div>
                                        <div class="profile-timeline-list">
                                            <ul>
                                                <li>
                                                    <div class="date">12 June</div>
                                                    <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                        Added</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 June</div>
                                                    <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                                <li>
                                                    <div class="date">10 June</div>
                                                    <div class="task-name"><i class="ion-ios-clock"></i> Event Added
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    <div class="task-time">09:30 am</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                <!-- Timeline Tab End -->
                                <!-- Tasks Tab start -->
                                <div class="tab-pane fade  @if (auth()->user()->type == 'expert') active show @endif"
                                    id="tasks" role="tabpanel">
                                    <div class="pd-20 profile-task-wrap">
                                        <div class="container pd-0">
                                            <!-- Open Task start -->
                                            <div class="task-title row align-items-center">
                                                <div class="col-md-8 col-sm-12">
                                                    <h5>Sent Request</h5>
                                                </div>
                                            </div>
                                            <div class="profile-task-list pb-30">
                                                @if (auth()->user()->projects->count())
                                                    <ul>
                                                        @foreach (auth()->user()->projects as $request)
                                                            <li class="card-body border m-2 p-10">
                                                                <h3 class="task-type">Project name:
                                                                    <b>{{ $request->name }}</b>
                                                                </h3>
                                                                Subject: {{ $request->pivot->subject }}
                                                                <div class="task-assign">Body: {!! $request->pivot->body !!} <div
                                                                        class="due-date">Sent date
                                                                        <span>{{ $request->pivot->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <div class="alert alert-warning">
                                                        <h5 class="text-black-50">No Request sent yet!</h5>
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- Open Task End -->

                                        </div>
                                    </div>
                                </div>
                                <!-- Tasks Tab End -->
                                <!-- Setting Tab start -->
                                <div class="tab-pane fade height-100-p @if (auth()->user()->type != 'expert') active show @endif"
                                    id="setting" role="tabpanel">
                                    <div class="profile-setting">
                                        <form method="POST" action="{{ route('admin.profile.update', []) }}">
                                            {{ csrf_field() }}
                                            <ul class="profile-edit-list row">
                                                @if (auth()->user()->type == 'expert')
                                                    <li class="weight-500 col-md-12">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="title"
                                                                value="{{ $profile->title ?? old('title') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="first_name"
                                                                value="{{ $profile->first_name ?? old('first_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="last_name"
                                                                value="{{ $profile->last_name ?? old('last_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg disabled" disabled
                                                                value="{{ $user->email }}" type="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input class="form-control form-control-lg date-picker"
                                                                name='date_birth' value="{{ $profile->date_birth }}"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="d-flex">
                                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                                    <input type="radio" id="male" name="gender"
                                                                        value="male" class="custom-control-input"
                                                                        @if ($profile->gender == 'male') checked @endif>
                                                                    <label class="custom-control-label weight-400"
                                                                        for="male">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-5">
                                                                    <input type="radio" id="female" name="gender"
                                                                        value="female" class="custom-control-input"
                                                                        @if ($profile->gender == 'female') checked @endif>
                                                                    <label class="custom-control-label weight-400"
                                                                        for="female">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="selectpicker form-control form-control-lg"
                                                                data-style="btn-outline-secondary btn-lg"
                                                                title="Not Chosen" name="country">
                                                                @foreach ($countries as $country)
                                                                    <option
                                                                        @if (strtolower($country->name) == strtolower($profile->country)) selected @endif>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>State/Province/Region</label>
                                                            <input class="form-control form-control-lg" name="district"
                                                                value="{{ $profile->district ?? old('district') }}"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="tel" value="{{ $profile->tel ?? old('tel') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Previous Organization</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="previous_organization"
                                                                value="{{ $profile->previous_organization ?? old('previous_organization') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Present Organization</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="present_organization"
                                                                value="{{ $profile->present_organization ?? old('present_organization') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Experience</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="experience"
                                                                value="{{ $profile->experience ?? old('experience') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Expertise</label>
                                                            {{-- @dump() --}}
                                                            <select name="expertises[]"
                                                                class="custom-select2 form-control" multiple="true"
                                                                style="width: 100%">
                                                                @foreach ($expertises as $expertise)
                                                                    <option
                                                                        @if (auth()->user()->expertises->contains($expertise->id)) selected @endif
                                                                        value="{{ $expertise->id }}">
                                                                        {{ $expertise->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control">{{ $profile->address ?? old('address') }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="agree_check">
                                                                <label class="custom-control-label weight-400"
                                                                    for="agree_check">I agree on this changes to my
                                                                    profile</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input id="update_btn" disabled type="submit"
                                                                class="btn btn-primary" value="Update Information">
                                                        </div>
                                                    </li>
                                                @elseif (auth()->user()->type == 'company')
                                                    <li class="weight-500 col-md-12">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                        <div class="form-group">
                                                            <label>Company Name</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="c_name"
                                                                value="{{ $profile->c_name ?? old('c_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Company Email</label>
                                                            <input class="form-control form-control-lg disabled"
                                                                name="c_email" value="{{ $profile->c_email }}"
                                                                type="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Type of Company</label>
                                                            {{-- @dump() --}}
                                                            <select name="type" class="custom-select2 form-control"
                                                                style="width: 100%">
                                                                <option value="">Select</option>
                                                                <option value="food">Food</option>
                                                                <option value="poultry">Poultry</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="tel" value="{{ $profile->tel ?? old('tel') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact Person</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="contact_person"
                                                                value="{{ $profile->contact_person ?? old('contact_person') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea name="c_address" class="form-control">{{ $profile->c_address ?? old('c_address') }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="agree_check">
                                                                <label class="custom-control-label weight-400"
                                                                    for="agree_check">I agree on this changes to my
                                                                    profile</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-0">
                                                            <input id="update_btn" disabled type="submit"
                                                                class="btn btn-primary" value="Update Information">
                                                        </div>


                                                    </li>
                                                @endif

                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <!-- Setting Tab End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#agree_check').change(function(e) {
                e.preventDefault();
                if ($(this).prop('checked', true)) {
                    $('#update_btn').prop('disabled', false);
                }
            });
            $('input[type="file"]').imageuploadify();
        });
    </script>
    <script src="{{ asset('b/vendors/scripts/imageuploadify.min.js') }}"></script>
@endpush
