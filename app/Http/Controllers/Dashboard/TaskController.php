<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index($id)
    {
        $project = Project::findOrFail($id);
        $tasks = DB::table('tasks')->join('projects', 'tasks.project_id', '=', 'projects.id')
        ->get();
        return view('dashboard.task.index', compact(['project','tasks']));
    }

    public function create($id)
    {
        $project = Project::findOrFail($id);

        return view('dashboard.task.create', compact(['project']));
    }

    public function store(Request $request)
    {
        $rules = [
            'task' => 'required|max:100',
            // 'is_status' => 'required',
        ];

        $messages = [
            'task.required' => 'Nama task harus diisi',
            'task.max' => 'Nama task terlalu panjang',
            // 'is_status.required' => 'Status harus dipilih',
        ];

        $this->validate($request, $rules, $messages);


        $task = new Task;
        $task->task = $request->task;
        $task->project_id = $request->project_id;
        // $task->is_status = $request->is_status;
        $task->save();


        return redirect()->back()->with('status', 'Task created!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $project = Project::findOrFail($id);
        
        return view('dashboard.task.edit', compact(['task', 'project']));
    }

    public function update(Request $request, $id)
    {
        $status = Task::find($id);

      
        $status->project_id = $request->project_id;
        $status->is_status = $request->is_status;
        // dd($status);
        $status->save();

        return redirect(route('dashboard.project.index'));

    }
}
