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

    public function show($id)
    {
        $task = Job::with('project', 'worker')->findOrFail($id);
        $project = Project::where('id', $task->project_id)->get();
        // dd($task);
        return view('admin.task.show')
        ->with('project', $project)
        ->with('task', $task);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
            'type_id' => 'required',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'file' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5024',
        ];

        $messages = [
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe pekerjaan harus diisi',
            'img.mimes' => 'Format gambar harus jpg,jpeg,png',
            'img.max' => 'Gambar tidak boleh lebih dari 2mb',
            'file.mimes' => 'Dokumen gambar harus doc,docx,pdf,xls,xlsx,ppt,pptx',
            'file.max' => 'Dokumen tidak boleh lebih dari 5mb',
        ];

        $this->validate($request, $rules, $messages);

        // ubah nama gambar
        if(!empty($request->img)){
            $img = $request->img;
            $imgName = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
        }
        
        if(!empty($request->file)){
            $file = $request->file;
            $fileName = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
        }



        $task = new Job;
        $task->project_id = $request->project_id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->worker_id = $request->worker_id;
        $task->type_id = $request->type_id;
        if(!empty($request->img)){
            $task->img = $imgName;
            $img->move(public_path() . '/storage/img/task', $imgName);
        }
        if(!empty($request->file)){
            $task->file = $fileName;
            $file->move(public_path() . '/storage/doc/task', $fileName);
        }
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
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'file' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5024',
        ];

        $messages = [
            'name.required' => 'Nama Job harus diisi',
            'name.max' => 'Nama Job terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe pekerjaan harus diisi',
            'img.mimes' => 'Format gambar harus jpg,jpeg,png',
            'img.max' => 'Gambar tidak boleh lebih dari 2mb',
            'file.mimes' => 'Dokumen gambar harus doc,docx,pdf,xls,xlsx,ppt,pptx',
            'file.max' => 'Dokumen tidak boleh lebih dari 5mb',
        ];

        

        $this->validate($request, $rules, $messages);

        // ubah nama gambar
        if(!empty($request->img)){
            $img = $request->img;
            $imgName = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
        }
        
        if(!empty($request->file)){
            $file = $request->file;
            $fileName = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
        }


        $task = Job::find($id);
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->description = $request->description;
        $task->worker_id = $request->worker_id;
        $task->status = $request->status;
        $task->type_id = $request->type_id;
        if(!empty($request->img)){
            $task->img = $imgName;
            $img->move(public_path() . '/storage/img/task', $imgName);
        }
        if(!empty($request->file)){
            $task->file = $fileName;
            $file->move(public_path() . '/storage/doc/task', $fileName);
        }
        // dd($task);
        $task->save();

        return redirect()->route('admin.project.show',$task->project_id)->with('status', 'Task updated!');
    }

    public function destroy($id)
    {
        Job::find($id)->delete();
        return back()->with('status', 'Task deleted!');
    }
}
