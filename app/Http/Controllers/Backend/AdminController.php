<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $data = [];
        if (auth()->user()->type == 'admin') {
            $data = [
                'company' => User::where('type', 'company')->count(),
                'expert' => User::where('type', 'expert')->count(),
                'service' => Service::count(),
                'project' => Project::count(),
                'users'   => User::all(['name', 'type', 'email', 'created_at', 'id'])->sortBy('created_at')->take(5),
            ];
        }
        // dd($data);
        return view('backend.dashboard.'. auth()->user()->type, compact('data'));
    }
}
