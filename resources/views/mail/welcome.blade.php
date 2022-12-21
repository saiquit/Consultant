@extends('mail.layouts.response')
@section('title')
    Welcome to XpertGroupBD
@endsection
@section('subject')
    Registration
@endsection
@section('body')
    {{ $data['message'] }}
@endsection
