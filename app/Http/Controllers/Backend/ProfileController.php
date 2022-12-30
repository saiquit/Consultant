<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Expertise;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profile = '';
        if (auth()->user()->type == 'admin') {
            if ($request->type == 'expert') {
                $profile = Profile::firstOrCreate([
                    'user_id' => $request->id
                ]);
            } else {
                $profile = CompanyProfile::firstOrCreate([
                    'user_id' => $request->id
                ]);
            }
        } elseif (auth()->user()->type == 'expert') {
            $profile = Profile::firstOrCreate([
                'user_id' => auth()->user()->id
            ]);
        } elseif (auth()->user()->type == 'company') {
            $profile = CompanyProfile::firstOrCreate([
                'user_id' => auth()->user()->id
            ]);
        }
        $expertises = Expertise::all('name', 'id', 'slug');
        $countries = DB::table('countries')->get();
        return view('backend.profile', compact('profile', 'countries', 'expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (auth()->user()->type == 'expert') {
            $request->interest_share == 'on' ? $request['interest_share'] = true : $request['interest_share'] = false;
            $profile = auth()->user()->profile()->update($request->except(['_token', 'expertises']));
            auth()->user()->complete = 1;
            auth()->user()->save();
            auth()->user()->expertises()->sync($request->expertises);
            return redirect()->back()->with('profile', $profile);
        } elseif (auth()->user()->type == 'company') {
            $profile = auth()->user()->company_profile()->firstOrCreate();
            $profile->update($request->except(['_token']));
            auth()->user()->complete = 1;
            auth()->user()->save();
            return redirect()->back()->with('profile', $profile);
        } else {
            return abort(501);
        }
    }

    public function img_update(Request $request)
    {
        $profile;
        $request->validate(['img' => 'nullable|image|mimes:jpeg,jpg,png']);
        if (auth()->user()->type == 'expert') {
            $profile = auth()->user()->profile;
        } else {
            $profile = auth()->user()->company_profile;
        }
        $img_name = $profile->id . '.' .  $request->file('img')->extension();
        if (Storage::exists('profile/' . $img_name)) {
            Storage::delete('profile/' . $img_name);
        }
        if ($request->hasFile('img')) {
            $request->file('img')->storeAs('profile', $img_name);
            $profile->update(['img' => $img_name]);
        }
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    function completeProfile(Type $var = null)
    {
        # code...
    }
}
