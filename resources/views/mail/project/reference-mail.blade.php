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
        <span><b>Project Title: {{ $data['project']['name'] }}</b></span><br><br>
        <span><b>Project Description: {!! $data['project']['description'] !!}</b></span>
    </p>
    {{-- <p style="padding: 2rem; background: rgb(215, 215, 215);">{{ $data['body'] }}</p> --}}
    <br>
@endsection
@section('para-2')
    If you are interested please accept if you are not familiar but you have e friend who can complete this project please
    forward him. If you are not interested and you have no friend to perform this project also then decline.
@endsection
@section('note')
    Note: For successful refereel you will get 20% payment.
@endsection
@section('buttons')
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('admin.projects.show', $data['project']['id']), 'slot' => 'If interested'],
    ])
    <br>
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => route('home', $data['project']['id']), 'slot' => 'Go Home'],
    ])
@endsection
