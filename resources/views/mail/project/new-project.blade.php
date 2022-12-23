@extends('mail.layouts.app')
@section('title')
    New Project has been added.
@endsection
@section('body')
    <tr>
        <td class="greeting" align="left"
            style="padding: 20px 0 0 0;font-family: Arial, sans-serif; font-size: 15px; line-height: 30px;">
            <sapn style="padding: 0 10px 0 10px; display:block">Dear {{ $project->author->name }},</span>
        </td>
    </tr>
    <tr>
        <td class="content" align="justify"
            style="font-family: Arial, sans-serif; font-size: 15px; padding: 20px 0 20px 0; line-height: 20px">
            <span style="padding: 0 10px 0 10px; display:block">What is Lorem Ipsum?
                Hi there!
                New Project {{ $project->name }} has been added.
            </span>
        </td>
    </tr>
    {{-- {{ $data['message'] }} --}}
@endsection
