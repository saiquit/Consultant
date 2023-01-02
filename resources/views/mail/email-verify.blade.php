@extends('mail.layouts.app')
@section('title')
    Verify
@endsection
@section('subject')
    Verify your account
@endsection

@section('para-1')
    Before proceeding, please check your email for a verification link. If you did not receive the email,
    <br>
    <hr>
@endsection
@section('buttons')
    @include('vendor.mail.html.custom-btn', [
        'data' => ['url' => $url, 'slot' => 'Verify'],
    ])
@endsection
