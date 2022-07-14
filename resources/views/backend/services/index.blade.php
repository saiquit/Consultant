@extends('layouts.backend.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Services</h4>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    @foreach ($services as $service)
    <div class="col-sm-12 col-md-12 col-lg-4 mb-30">
        <div class="card card-box">
            <div class="card-body">
                <h5 class="card-title weight-500">{{$service->name}}</h5>
                <p class="card-text">{{$service->about}}</p>
                <p class="card-text"><small class="text-muted">{{$service->updated_at->diffForHumans()}}</small></p>
                @if (auth()->user()->type =='admin')
                <a href="{{ route('admin.services.edit', $service->id) }}"> <button type="button"
                        class="btn btn-outline-success">Edit</button></a>
                <a href="{{ route('admin.services.show', $service->id) }}"> <button type="button"
                        class="btn btn-outline-info">View</button></a>

                @endif
            </div>
            <img class="card-img-bottom" src="/b/vendors/images/img5.jpg" alt="Card image cap">
        </div>
    </div>
    @endforeach
</div>
@endsection