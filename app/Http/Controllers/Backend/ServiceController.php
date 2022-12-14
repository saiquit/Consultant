<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all([
            'name', 'about', 'updated_at', 'id', 'icon'
        ]);
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {

        if ($request->hasAny(['name', 'about', 'description'])) {
            $validation = Validator::make($request->all(), [
                'name' => 'string|max:255|required',
                'about' => 'string|required',
                'description' => 'string|required',
                'subitems' => 'string|required',
            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation);
            } else {
                $newService = $service->create([
                    'name' => $request->name,
                    'slug' =>  Str::slug($request->name),
                    'about' => $request->about,
                    'description' => $request->description,
                    'subitems'    => $request->subitems
                ]);
                if ($request->validate(['icon' => 'nullable|image|mimes:jpeg,jpg,png'])) {
                    $icon_name = $newService->id . '.' .  $request->file('icon')->extension();
                    if (Storage::exists('service/icons/' . $icon_name)) {
                        Storage::delete('service/icons/' . $icon_name);
                    }
                    if ($request->hasFile('icon')) {
                        $request->file('icon')->storeAs('service/icons/', $icon_name);
                        $newService->update(['icon' => $icon_name]);
                    }
                }
            }
            return view('backend.services.view', [
                'service' => $newService
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('backend.services.view', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if ($request->hasAny(['name', 'about', 'description'])) {
            $validation = Validator::make($request->all(), [
                'name' => 'string|max:255|required',
                'about' => 'string|required',
                'description' => 'string|required'
            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation);
            } else {
                $service->update([
                    'name' => $request->name,
                    'slug' =>  Str::slug($request->name),
                    'about' => $request->about,
                    'description' => $request->description,
                    'subitems'    => $request->subitems
                ]);
                if ($request->validate(['icon' => 'nullable|image|mimes:jpeg,jpg,png'])) {
                    $icon_name = $service->id . '.' .  $request->file('icon')->extension();
                    if (Storage::exists('service/icons/' . $icon_name)) {
                        Storage::delete('service/icons/' . $icon_name);
                    }
                    if ($request->hasFile('icon')) {
                        $request->file('icon')->storeAs('service/icons/', $icon_name);
                        $service->update(['icon' => $icon_name]);
                    }
                }
            }
            return view('backend.services.view', compact('service'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->projects()->delete();
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
