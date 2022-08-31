<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Job;

class JobController extends Controller
{
    public function index($id)
    {
        $project = Project::with('customer')->findOrFail($id);
        $job = Job::where('project_id', $project->id)->with('worker')->get();

        return view('dashboard.project.job.index')
        ->with('project', $project)
        ->with('job', $job);
    }

    public function create($id)
    {
        $project = Project::with('customer')->findOrFail($id);
        $worker = User::all();
        return view('dashboard.project.job.create')
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
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama klien harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $job = new Job;
        $job->project_id = $request->project_id;
        $job->name = $request->name;
        $job->description = $request->description;
        $job->worker_id = $request->worker_id;
        $job->type_id = $request->type_id;
        $job->save();

        return redirect('dashboard/project')->with('status', 'Project created!');
    }

    public function edit($id)
    {
        $job = Job::with('worker')->findOrFail($id);
        $worker = User::all();

        return view('dashboard.project.job.edit')
        ->with('job', $job)
        ->with('worker', $worker);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama klien harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $job = Job::find($id);
        $job->project_id = $request->project_id;
        $job->name = $request->name;
        $job->description = $request->description;
        $job->worker_id = $request->worker_id;
        $project->status = $request->status;
        $job->type_id = $request->type_id;
        $job->save();

        return redirect('dashboard/project')->with('status', 'Project created!');
    }

}
