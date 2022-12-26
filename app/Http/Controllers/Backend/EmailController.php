<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ProjectRequestResponse;
use App\Mail\ReferenceMail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function projectRequestResponse(Request $request, $project_id)
    {
        $request->validate([
            'email' => 'email|required',
            'message' => 'required'
        ]);
        $project = Project::findOrFail($project_id);
        try {
            $user = User::where('email', $request->email)->firstOrFail();
        } catch (\Throwable $th) {
            abort(404, ['error', 'No registered user found.']);
        }
        $project->email_responses()->attach([
            'user_id' => $user->id,
        ], [
            'subject' =>  auth()->user()->name . 'is refering you ' . $project->name,
            'body' => $request->message,
        ]);
        $mailData = ['name' => $user->name, 'subject' => auth()->user()->name . 'is refering you ' . $project->name, 'project' => $project];
        Mail::to($request->email)->send(new ReferenceMail($mailData));
        return back();
    }
}
