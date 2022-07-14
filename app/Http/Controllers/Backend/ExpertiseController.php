<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::all()->sortBy('created_at');
        return view('backend.expertise.index', compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.expertise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasAny(['name', 'description'])) {
            $validation = Validator::make($request->all(), [
                'name' => 'string|max:255|required',
                'name' => 'string|required',
            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation);
            } else {
                $expertise = Expertise::create([
                    'name' => $request->name,
                    'slug' =>  Str::slug($request->name),
                    'description' => $request->description
                ]);
            }
            return redirect()->route('admin.expertises.show', compact('expertise'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function show(Expertise $expertise)
    {
        return view('backend.expertise.view', compact('expertise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function edit(Expertise $expertise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expertise $expertise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expertise $expertise)
    {
        //
    }
}
