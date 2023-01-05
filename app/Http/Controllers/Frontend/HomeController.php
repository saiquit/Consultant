<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function App\Helper\displayAlert;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $services = Service::limit(6)->get(['name', 'slug', 'about','icon']);
        return view('frontend.home', compact('services'));
    }
    public function about(Request $request)
    {
        return view('frontend.about');
    }
    public function requestEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'name' => 'string|required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        DB::table('request_call_backs')->insert([
            'type' => $request->type,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'service_id' => $request->services,
        ]);
        return back()->with('message', 'success|We will contact with you soon!');
    }
    public function requestForService()
    {
        $services = Service::all(['name', 'id']);
        return json_encode($services);
    }
}
