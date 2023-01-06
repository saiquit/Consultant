@extends('layouts.backend.app')

@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Edit a {{$expertise->name}}</h4>
            {{-- <p class="mb-30">All bootstrap element classies</p> --}}
        </div>
    </div>
    <form action="{{ route('admin.expertises.update', $expertise) }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="@if ($errors->has('name')) form-control-danger @endif form-control" type="text"
                    name="name" value="{{$expertise->name}}" placeholder="Name of the Service">
                @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$errors->first('name')}}</strong>
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
                        name="description" placeholder="Enter Description ...">{{$expertise->description}}</textarea>
                    @if ($errors->has('description'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$errors->first('description')}}</strong>
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