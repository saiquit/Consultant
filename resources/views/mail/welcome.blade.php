@extends('mail.layouts.app')
@section('title')
    Welcome to XpertGroupBD
@endsection
@section('subject')
    Registration
@endsection
@section('body')
    <tr>
        <td class"greeting" align="left"
            style="padding: 20px 0 0 0;font-family: Arial, sans-serif; font-size: 15px; line-height: 30px;">
            <sapn style="padding: 0 10px 0 10px; display:block">Dear {{ $userData['name'] }},</span>
        </td>
    </tr>
    <tr>
        <td class="content" align="justify"
            style="font-family: Arial, sans-serif; font-size: 15px; padding: 20px 0 20px 0; line-height: 20px">
            <span style="padding: 0 10px 0 10px; display:block">What is Lorem Ipsum?
                Hi there!
                Welcome to the XpertGroupBD Family!
                I am glad that you are reading this email. I will be happy to help you grow your business.
                As a thank you for joining us, I would like to give you a gift.
            </span>
        </td>
    </tr>
    {{-- {{ $data['message'] }} --}}
@endsection
