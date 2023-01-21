<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_q = User::query();
        $users = $user_q->where('type', '=', $request->type)->orderBy('created_at', 'desc')->get();
        
        if ($request->type == 'expert') {
            return view('backend.users.experts', compact('users'));
        }elseif ($request->type == 'company'){
            return view('backend.users.company', compact('users'));
        }else {
            return \abort(404, 'Not found.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404,);
        // return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404,);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        // $countries = DB::table('countries')->get();
        if ($user->type == 'expert') {
            $profile =  $user->profile;
            if (!$profile) {
                $profile = $user->profile()->create();
            }
            return view('backend.users.p_view', compact('profile'));
        } elseif ($user->type == 'company') {
            $profile = $user->company_profile;
            if (!$profile) {
                $profile = $user->company_profile()->create();
            }
            return view('backend.users.cp_view', compact('profile'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->type == 'expert') {
            $user->profile()->delete();
            $user->expertises()->detach();
            $user->projects()->detach();
            $user->email_receivers()->delete();
            $user->delete();
        }
        if ($user->type == 'company') {
            $user->company_profile()->delete();
            $user->posted_projects()->delete();
            $user->delete();
        }
        return \redirect()->back();
    }
}
