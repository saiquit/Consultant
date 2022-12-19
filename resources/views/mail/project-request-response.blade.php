@extends('mail.layouts.response')
@section('title') In Response to  {{$data['project_name']}} Request @endsection
@section('subject') In Response to  {{$data['project_name']}} Request @endsection
@section('body'){{$data['message']}}@endsection