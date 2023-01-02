<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Mail\NewProject;
use App\Models\Project;
use App\Models\Service;
use App\Notifications\ProjectNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,company', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $services = Service::all(['name', 'slug', 'id']);
        $pq = Project::query();
        if (auth()->user()->type == 'admin') {
            if ($request->has('service')) {
                $pq->whereHas('service', function ($q) use ($request) {
                    $q->where('id', $request->service);
                });
            }
            if ($request->has('approved')) {
                $pq->where('approved', $request->approved);
            }
            $projects = $pq->orderBy('created_at', 'desc')->get();
        } elseif (auth()->user()->type == 'company') {
            $projects = auth()->user()->posted_projects;
        } else {
            $projects = $pq->where('approved', true)->latest()->get();
        }
        return view('backend.projects.index', compact('projects', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_id = Project::latest('id')->first() ? Project::latest('id')->first()->id + 1 : 1;
        $services = Service::all(['name', 'id']);
        return view('backend.projects.create', compact('services', 'new_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        if ($request->hasAny(['name', 'description'])) {
            $validation = Validator::make($request->all(), [
                'name' => 'string|max:255|required',
                'description' => 'string|required',
                'location' => 'string|required',
                'service' => 'required|integer',
                'type' => 'required',
                'budget' => 'integer|required',
                'timeframe' => 'integer|required',
                'keywords' => 'string',
                'last_date' => 'string',
            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation);
            } else {
                $service = $service->findOrFail($request->service);
                $project = $service->projects()->create([
                    'name' => $request->name,
                    'author_id' => auth()->user()->id,
                    'slug' =>  Str::slug($request->name),
                    'description' => $request->description,
                    'location' => $request->location,
                    'budget' => $request->budget,
                    'timeframe' => $request->timeframe,
                    'type' => $request->type,
                    'live' => $request->live == 'on' ? 1 : 0,
                    'keywords' => $request->keywords,
                    'last_date' => $request->last_date
                ]);
            }
            Mail::to(auth()->user()->email)->send(new NewProject($project));
            return view('backend.projects.view', compact('project'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('backend.projects.view', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if ($project->approved && !auth()->user()->isAdmin()) {
            return redirect()->back()->withErrors(['message' => 'Cannot update after approve.']);
        }
        if ($request->hasAny(['name', 'description'])) {
            $validation = Validator::make($request->all(), [
                'name' => 'string|max:255|required',
                'description' => 'string|required',

            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation);
            } else {
                $project = tap($project)->update([
                    'name' => $request->name,
                    'slug' =>  Str::slug($request->name),
                    'description' => $request->description,
                    'location' => $request->location,
                    'type' => $request->type,
                    'live' => $request->live == 'on' ? 1 : 0,
                    'keywords' => $request->keywords,
                    'last_date' => $request->last_date
                ]);
            }
            // Notification::send(Helper::instance()->get_admins(), new ProjectNotification($project, 'Project is Updated'));
            return view('backend.projects.view', compact('project'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
