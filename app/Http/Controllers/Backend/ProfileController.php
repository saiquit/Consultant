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
    public function index()
    {
        $profile = '';
        if (auth()->user()->type == 'expert') {
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
            $validator = Validator::make($request->all(), [
                'tel' => 'string|max:255',
                'first_name' => 'string|max:255|required',
                'last_name' => 'string|max:255|required',
                'address'   => 'string',
                'district' => 'string',
                'country' => 'string',
                'date_birth' => 'date',
                'gender' => 'string',
                'previous_organization' => 'string|nullable',
                'present_organization' => 'string|nullable',
                'experience' => 'integer|nullable',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $profile = auth()->user()->profile()->update([...$request->except(['_token', 'expertises']), 'complete' => 1]);
            auth()->user()->expertises()->sync($request->expertises);
            return redirect()->back()->with('profile', $profile);
        } elseif (auth()->user()->type == 'company') {
            $validator = Validator::make($request->all(), [
                'tel' => 'string|max:255',
                'c_name' => 'string|max:255|required',
                'type' => 'string|nullable',
                'c_email' => 'email',
                'address' => 'string|nullable',
                'contact_person' => 'string|nullable',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $profile = auth()->user()->company_profile()->firstOrCreate();
            $profile->update([...$request->except(['_token']), 'complete' => 1]);
            return redirect()->back()->with('profile', $profile);
        } else {
            return abort(501);
        }
    }

    public function img_update(Request $request)
    {
        $request->validate(['img' => 'nullable|image|mimes:jpeg,jpg,png,gif']);
        $profile = Profile::findOrfail(auth()->user()->id);
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
