<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Project;

class TaskAdminController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $id;

        $workers = User::all();

        return view('admin.task.create')
        ->with('workers', $workers)
        ->with('id', $id);
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
            'type_id.required' => 'Tipe pekerjaan harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $task = new Job;
        $task->project_id = $request->project_id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->worker_id = $request->worker_id;
        $task->type_id = $request->type_id;
        // dd($task);
        $task->save();

        return redirect()->route('admin.project.show',$task->project_id)->with('status', 'Task created!');
    }

    public function edit($id)
    {
        $task = Job::with('worker')->findOrFail($id);
        $workers = User::all();

        return view('admin.task.edit')
        ->with('task', $task)
        ->with('workers', $workers)
        ->with('id', $id);
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
            'type_id.required' => 'Tipe pekerjaan harus diisi',
        ];

        

        $this->validate($request, $rules, $messages);

        $task = Job::find($id);
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->description = $request->description;
        $task->worker_id = $request->worker_id;
        $task->status = $request->status;
        $task->type_id = $request->type_id;

        $task->save();

        return redirect()->route('admin.project.show',$task->project_id)->with('status', 'Task updated!');
    }

    public function destroy($id)
    {
        Job::find($id)->delete();
        return back()->with('status', 'Task deleted!');
    }
}
