@extends('layouts.backend.app')

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>{{$project->name}}</h4>
                </div>
                {{-- <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
    </div>
    <div class="blog-wrap">
        <div class=" pd-0">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-detail card-box overflow-hidden mb-30">
                        <div class="blog-img">
                            <img src="/b/vendors/images/img2.jpg" alt="">
                        </div>
                        <h4 class="p-4">About</h4>
                        <div class="blog-caption">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection