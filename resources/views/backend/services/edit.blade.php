@extends('layouts.backend.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Service</h4>
                <p class="mb-30">All bootstrap element classies</p>
            </div>
        </div>
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="@if ($errors->has('name')) form-control-danger @endif form-control" type="text"
                        name="name" value="{{ $service->name }}" placeholder="Name of the Service">
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
                <label class="col-sm-12 col-md-2 col-form-label">About</label>
                <div class="col-sm-12 col-md-10">
                    <input class="@if ($errors->has('about')) form-control-danger @endif form-control" type="text"
                        name="about" value="{{ $service->about }}" placeholder="About the service">
                    @if ($errors->has('about'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $errors->first('about') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Icon upload</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" accept=".jpg,.jpeg,.png"
                        class="@if ($errors->has('icon')) form-control-danger @endif form-control" type="text"
                        name="icon" value="{{ old('icon') }}" placeholder="icon the service">
                    @if ($errors->has('icon'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $errors->first('icon') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Sub services</label>
                <div class="col-sm-12 col-md-10">
                    <input value="{{ $service->subitems }}" type="text" name="subitems" class="form-control w-100"
                        data-role="tagsinput" />

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="html-editor">
                        <h4 class="h4 text-blue">Description</h4>
                        <textarea
                            class="@if ($errors->has('description')) form-control-danger @endif textarea_editor form-control border-radius-0"
                            name="description" placeholder="Enter Description ...">{{ $service->description }}</textarea>
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
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{ asset('b/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@endpush
