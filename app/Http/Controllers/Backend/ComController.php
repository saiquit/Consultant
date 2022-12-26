<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComController extends Controller
{
    public function reqForProject(Request $request, Project $project)
    {
        $responseData = $project->email_responses()->attach(auth()->user()->id, ['subject' => $request->subject, 'body' => $request->body]);
        dd($responseData);
        $reference = [
            'subject' => $responseData['subject'],
        ];
        return back();
    }
    public function approve(Request $request, Project $project)
    {
        if (auth()->user()->type == 'admin') {
            $project->update(['approved' => true]);
            // Notification::send($project->author, new ProjectNotification($project, 'Your Project is approved'));
            return redirect()->back()->with('project', $project);
        }
        return abort(402);
    }
    public function mark()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->noContent();
    }

    public function ajaxExpert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response('Please Type Correct', 404);
        } else {
            $expertises = User::where([['type', '=', 'expert'], ['name', 'LIKE', '%' . $request->search . '%']])->orWhereHas('expertises', function (Builder $q) use ($request) {
                $q->where('slug', 'LIKE', '%' . $request->search . '%');
            })->get(['name', 'email', 'id']);
            if ($expertises->count()) {
                return response()->json($expertises, 200);
            }
        }
    }
}
