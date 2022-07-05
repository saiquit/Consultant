<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $services = Service::latest()->limit(6)->get(['name', 'slug', 'about']);
        return view('frontend.home', compact('services'));
    }
    public function about(Request $request)
    {
        return view('frontend.about');
    }
}
