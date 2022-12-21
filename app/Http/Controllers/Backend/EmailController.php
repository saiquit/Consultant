<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ProjectRequestResponse;
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
        $user = User::where('email', $request->email)->firstOrFail();
        $project->email_responses()->attach([
            'user_id' => $user->id,
        ], [
            'subject' => auth()->user()->isAdmin() ? 'A response to ' . $project->name . ' Request.' : auth()->user()->name . 'is refering you ' . $project->name,
            'body' => $request->message,
        ]);
        Mail::to($request->email)
            ->send(new ProjectRequestResponse(strval($request->message), $project));
        return back();
    }
}
