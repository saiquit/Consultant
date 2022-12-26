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

@section('para-1')
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
    <br>
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('home', $data['project']['id']), 'slot' => 'Go Home'],
    ])
@endsection
