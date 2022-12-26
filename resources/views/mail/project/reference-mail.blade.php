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
    <div class="p-4 bg-info">
        <p>
            {{ $data['body'] }}
        </p>
    </div>
    <br>
    <a href="{{ route('admin.projects.show', $data['project']['id']) }}" class="btn btn-primary hero-primary">Open project</a>
@endsection

@section('para1')
    You are considered as a potential canditate for a project with paid/payment method.
    <br>
    <hr>
    <p>
        <span><b>Project Title: {{ $data['project']['name'] }}</b></span>
        <span><b>Project Description: {!! $data['project']['description'] !!}</b></span>
    </p>
    <p style="padding: 2rem; background: rgb(215, 215, 215);">{{ $data['body'] }}</p>
    <br>
@endsection
@section('note')
    Note: For any inquiry please call. ........
@endsection
@section('buttons')
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('admin.projects.show', $data['project']['id']), 'slot' => 'Go to Project'],
    ])

    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('admin.projects.show', $data['project']['id']), 'slot' => 'Go to Project'],
    ])
@endsection
