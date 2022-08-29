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
        ];

        $messages = [
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
            'worker_id.required' => 'Nama klien harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $issue = new Issue;
        $issue->project_id = $request->project_id;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
        $issue->save();

        return redirect('dashboard/project')->with('status', 'Project created!');
    }

    public function edit($id)
    {
        $issue = Issue::with('worker')->findOrFail($id);
        $worker = User::all();

        return view('dashboard.project.issue.edit')
        ->with('issue', $issue)
        ->with('worker', $worker);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
            'worker_id.required' => 'Nama klien harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $issue = Issue::find($id);
        $issue->project_id = $request->project_id;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
        $issue->save();

        return redirect('dashboard/project')->with('status', 'Project created!');
    }
}
