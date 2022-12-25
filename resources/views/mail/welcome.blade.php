@extends('mail.layouts.app')
@section('title')
    Welcome to XpertGroupBD
@endsection
@section('subject')
    Welcome to Xpertgroupbd
@endsection
@section('to')
    Dear {{ $data['name'] }}
    <hr>
@endsection
@section('body')
    Xpertgroupbd is the first and unique platformin Bangladesh for the manufacturing sector where indeustries can post their
    issues/problems/projects/requirements and industry senior expertise offer solution and services through paid consultancy
    method.
    <br>
    <hr>
    <b>Note: For a successful reference you will be paid 20% commision from the project.</b>
    <br>
    <a href="{{ route('admin.home') }}" class="btn btn-primary hero-primary">Go to Dashboard</a>
@endsection
