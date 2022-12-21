@extends('layouts.backend.app')
@push('css')
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/switchery/switchery.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add a New Project</h4>
                <p class="mb-30">All bootstrap element classies</p>
            </div>
        </div>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">ID</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="id" value="{{ $new_id }}" disabled
                        placeholder="ID">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="@if ($errors->has('name')) form-control-danger @endif form-control" type="text"
                        name="name" value="{{ old('name') }}" placeholder="Name of the Project">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Service Type</label>
                <div class="col-md-10 col-sm-12">
                    <div class="form-group">
                        <select name="service" class="selectpicker form-control" data-size="5">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Project Type</label>
                <div class="col-md-10 col-sm-12">
                    <div class="form-group">
                        <select name="type" class="selectpicker form-control" data-size="5">
                            <option value="onsite">Onsite</option>
                            <option value="offsite">Offsite</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Live</label>
                <div class="col-md-10 col-sm-12">
                    <div class="form-group">
                        <input name="live" type="checkbox" class="switch-btn" data-size="small" data-color="#52f409" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Location</label>
                <div class="col-sm-12 col-md-10">
                    <input class="@if ($errors->has('location')) form-control-danger @endif form-control" type="text"
                        name="location" value="{{ old('location') }}" placeholder="Location of the Project">
                    @if ($errors->has('location'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $errors->first('location') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="html-editor">
                        <h4 class="h4 text-blue">Description</h4>
                        <textarea
                            class="@if ($errors->has('description')) form-control-danger @endif textarea_editor form-control border-radius-0"
                            name="description" placeholder="Enter Description ...">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Keywords</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="keywords" class="form-control" value="" data-role="tagsinput" />

                </div>
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
@endsection

@push('js')
    <!-- switchery js -->
    <script src="{{ asset('b/src/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('b/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('b/vendors/scripts/advanced-components.js') }}"></script>
@endpush
