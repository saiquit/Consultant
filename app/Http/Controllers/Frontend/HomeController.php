<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('frontend.home');
    }
    public function about(Request $request)
    {
        return view('frontend.about');
    }
}
