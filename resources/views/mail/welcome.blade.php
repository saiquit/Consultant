@extends('mail.layouts.app')
@section('title')
    Welcome to XpertGroupBD
@endsection
@section('subject')
    Welcome to Xpertgroupbd
@endsection
@section('to')
    Dear {{ $data['name'] }}
@endsection
@section('para1')
    Xpertgroupbd is the first and unique platform in Bangladesh for the manufacturing sector where industries can post their
    issues/problems/projects/requirements and industry senior expertise offer solution and services through paid consultancy
    method.
    <br>
    <hr>
    <br>
    <a href="{{ route('admin.home') }}" class="btn btn-primary hero-primary">Go to Dashboard</a>
@endsection

@section('note')
    Note: For a successful reference you will be paid 20% commision from the project.
@endsection
@section('buttons')
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('admin.home'), 'slot' => 'Go to Dashboard'],
    ])
@endsection
