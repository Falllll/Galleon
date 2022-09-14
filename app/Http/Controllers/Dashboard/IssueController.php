<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Issue;

class IssueController extends Controller
{
    public function index($id)
    {
        $project = Project::with('customer')->findOrFail($id);
        $issue = Issue::where('project_id', $project->id)->with('worker')->get();

        return view('dashboard.project.issue.index')
        ->with('project', $project)
        ->with('issue', $issue);
    }

    public function create($id)
    {
        $project = Project::with('customer')->findOrFail($id);
        $worker = User::all();
        return view('dashboard.project.issue.create')
        ->with('project', $project)
        ->with('worker', $worker);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
            'type_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe isu harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $issue = new Issue;
        $issue->project_id = $request->project_id;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
        $issue->save();

        return redirect()->back()->with('status', 'Issue created!');
    }

    public function edit($id)
    {
        $issue = Issue::with('worker')->findOrFail($id);
        $worker = User::all();
        $project = Project::with('customer')->find($id);

        return view('dashboard.project.issue.edit')
        ->with('issue', $issue)
        ->with('project', $project)
        ->with('worker', $worker);
    }

    public function show($id)
    {
        $issue = Issue::with('project', 'worker')->findOrFail($id);
        $project = Project::where('id', $issue->project_id)->get();
        // dd($issue);
        return view('dashboard.project.issue.show')
        ->with('project', $project)
        ->with('issue', $issue);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
            'type_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe isu harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $issue = Issue::find($id);
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
        $issue->status = $request->status;
        $issue->save();

        return redirect()->back()->with('status', 'Issue updated!');
    }
}
