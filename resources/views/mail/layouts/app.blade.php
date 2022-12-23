<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('f/assets/css/mail.css') }}">
</head>

<body style="border: 0; margin: 0;">

    <!--CONTAINER TABLE -->
    <table bgcolor="#0A1C47" border="0" cellspacing="0" cellpadding="0" width="100%"
        style="table-layout: fixed; background-image:url('https://res.cloudinary.com/du3l28sfg/image/upload/v1613245367/_src/llcom/bg_graphics.png');background-size: 200px">
        <tr>
            <td align="center" style="padding: 20px 0 20px 0;">
                <!-- HIDDEN PREHEADER -->
                <div
                    style="display:none; font-size:1px; color:#333333; line-height:1px; font-family:Arial, sans-serif; max-height:0px; opacity:0; overflow:hidden; mso-hide: all;">
                    This won't be shown in the design, but will be visible in the inbox preview.
                </div>
                <!-- WRAPPER TABLE -->
                <table class="wrapper" border="0" cellspacing="0" cellpadding="0" width="600">
                    <!-- LOGO / PREHEADER TEXT -->
                    <tr>
                        <td>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td class="logo" align="left">
                                        <!-- change with your header info here -->
                                        <a href="https://lenielluzardo.com/" target="_blank"><img
                                                src="{{ asset('f/assets/img/logo/logo.png') }}" alt="Check out the site"
                                                height="40" border="0"
                                                style="display: block; padding: 0 0 0 10px; color:#FEFEFE; font-family: Arial, sans-serif; font-weight: bold; font-size: 20px;"></a>
                                    </td>
                                    <td class="hide" align="right"
                                        style="font-family: Arial, sans-serif; font-size: 18px; color:#FEFEFE; padding: 0 10px 0 0;">
                                        @component('mail::message')
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- CONTAINER TABLE -->
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="table-layout: fixed;">
            <tr>
                <td align="center">
                    <!-- TABLE WRAPPER -->
                    <table class="wrapper" bgcolor="#FEFEFE" border="0" cellspacing="0" cellpadding="0" width="600"
                        style="table-layout:fixed;">
                        <tr>
                            <td>
                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                    <tr>
                                        <td align="center" style="font-family: Arial, sans-serif; font-size: 15px;">
                                        </td>
                                    </tr>
                                    @yield('body')
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- FOOTER -->
        <table bgcolor="#0A1C47" border="0" cellspacing="0" cellpadding="0" width="100%"
            style="table-layout: fixed; background-image:url('https://res.cloudinary.com/du3l28sfg/image/upload/v1613245367/_src/llcom/bg_graphics.png');background-size: 200px"
            border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed;" width="100%">
            <tr>
                <td align="center">
                    <!--WRAPPER TABLE -->
                    <table class="wrapper" border="0" cellspacing="0" cellpadding="0" width="600">
                        <tr>
                            <td align="center"
                                style="padding: 10px 0px 10px 0; color: #FEFEFE; font-family: Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 18px;">
                                <a class="apple-links" href="https://lenielluzardo.com/"
                                    style="display:block; font-weight: bold; font-size:20px; padding: 10px 0 10px 0; color:#FEFEFE">Leniel
                                    Luzardo</a>
                                <span style="display:block;"> Fullstack Software Engineer | Digital Artist </span>
                                <span class="apple-links" style="display:block; color: #FEFEFE; text-decoration:none">
                                    Rosario, SF - Argentina</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"
                                style="color:#FEFEFE;font-family: Arial, sans-serif; font-size: 12px; padding: 30px 0 10px 0">
                                Sick of these emails? <a class="apple-links" style="color:#ffcc44;"
                                    href="# /* UNSUBSCRIBE SERVICE */"> Unsubscribe</a> Immediately
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </body>

    </html>
