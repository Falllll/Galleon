<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Job;
use App\Models\Issue;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $projects = Project::with('customer')->get();
        return view('admin.project.index', compact(['projects']));
    }

    public function create()
    {
        $customers = Customer::where('is_active', 1)->get();
        return view('admin.project.create', compact(['customers']));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'customer_id' => 'required',
            'proposal_date' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Proyek harus diisi',
            'name.max' => 'Nama Proyek terlalu panjang',
            'customer_id.required' => 'Nama klien harus diisi',
            'proposal_date.required' => 'Tanggal harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $date =  date('y-m-d', strtotime($request->proposal_date));

        $project = new Project;
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->proposal_date = $date;
        $project->description = $request->description;
        $project->save();

        return redirect('admin/project')->with('status', 'Project created!');
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact(['customers', 'project']));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'customer_id' => 'required',
            'proposal_date' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Proyek harus diisi',
            'name.max' => 'Nama Proyek terlalu panjang',
            'customer_id.required' => 'Nama klien harus diisi',
            'proposal_date.required' => 'Tanggal harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $date =  date('y-m-d', strtotime($request->proposal_date));

        $project = Project::find($id);
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->status = $request->status;
        $project->proposal_date = $date;
        $project->description = $request->description;
        $project->save();

        return redirect('admin/project')->with('status', 'Project updated!');
    }

    public function show($id)
    {
        $project = Project::with('customer')->findOrFail($id);
        $customers = Customer::all();
        $tasks = Job::where('project_id', $project->id)->with('worker')->get();
        $issues = Issue::where('project_id', $project->id)->with('worker')->get();

        return view('admin.project.show')
        ->with('project', $project)
        ->with('tasks', $tasks)
        ->with('issues', $issues)
        ->with('customers', $customers);
    }

    public function planned()
    {
        $projects = Project::where('status', 'Plan')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }

    public function progress()
    {
        $projects = Project::where('status', 'Progress')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }

    public function done()
    {
        $projects = Project::where('status', 'Done')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }

    public function closed()
    {
        $projects = Project::where('status', 'Closed')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }

    public function canceled()
    {
        $projects = Project::where('status', 'Canceled')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }

    public function hold()
    {
        $projects = Project::where('status', 'On Hold')->get();

        return view('admin.project.index')
        ->with('projects', $projects);
    }
    
    public function destroy($id)
    {
        Project::find($id)->delete();
        return back()->with('status', 'Project deleted!');
    }
}
