@extends('layouts.backend.app')

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title pull-left d-flex align-items-center">
                        <img src="@if ($service->icon) {{ url('/storage/service/icons/' . $service->icon) }} @else /b/vendors/images/default.bmp @endif"
                            alt="" style="height: 50px; width: 50px" class=" mr-2">
                        <h4>{{ $service->name }}</h4>
                    </div>
                    {{-- <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                    </ol>
                </nav> --}}
                    @if (auth()->user()->type == 'admin')
                        <div class="pull-right">
                            <button class="btn btn-info">Update</button>
                            <button onclick="document.getElementById('approve_form').submit()" class="btn btn-danger">Delete
                            </button>
                        </div>
                        <form id="approve_form" action="{{ route('admin.services.destroy', $service) }}" hidden
                            method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class=" pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <h4 class="p-4">About</h4>
                            <div class="blog-caption">
                                {!! $service->about !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card-box mb-30">
                            <h5 class="pd-20 h5 mb-0">Latest Projects</h5>
                            <div class="latest-post">
                                <ul>
                                    @foreach ($service->projects as $project)
                                        <li>
                                            <h4><a href="#">{{ $project->name }}</a></h4>
                                            <span>{{ $project->created_at->diffForHumans() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
