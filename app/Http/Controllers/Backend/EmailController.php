<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ProjectRequestResponse;
use App\Mail\ReferenceMail;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['projectRequestResponse']]);
    }
    public function projectRequestResponse(Request $request, $project_id)
    {
        $request->validate([
            'email' => 'email|required',
            // 'message' => 'required',
            'name' => 'required',
        ]);
        $project = Project::findOrFail($project_id);
        $project->email_responses()->attach([
            'user_id' => auth()->id(),
        ], [
            'subject' =>  auth()->user()->name . 'is refering you ' . $project->name,
            // 'body' => $request->message,
            'refered_email' => $request->email,
            'name' => $request->name,
        ]);
        $mailData = ['name' => $request->name, 'subject' => auth()->user()->name . 'is refering you ' . $project->name, 'project' => $project];
        Mail::to($request->email)->send(new ReferenceMail($mailData));
        return back();
    }

    public function email_request_show()
    {
        $email_req = DB::table('request_call_backs')->get();
        return view('backend.email_request', compact('email_req'));
    }
    public function email_request_complete(Request $request, $id)
    {
        $em_req = DB::table('request_call_backs')->where('id', $id)->update(['complete' => 1]);
        return back();
    }
}
