@extends('mail.layouts.app')
@section('title')
    Refered
@endsection
@section('subject')
    Refered for a project
@endsection
@section('to')
    Dear {{ $data['name'] }}
    <hr>
@endsection
@section('body')
    A user refered you to
    <br>
    <hr>
    <br>
    <a href="{{ route('admin.projects.show', $data['project']['id']) }}" class="btn btn-primary hero-primary">Open project</a>
@endsection
