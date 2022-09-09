<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Issue;
use App\Models\Project;

class IssueAdminController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $id;

        $workers = User::all();

        return view('admin.issue.create')
        ->with('workers', $workers)
        ->with('id', $id);
    }

    public function show($id)
    {
        $issue = Issue::with('project', 'worker')->findOrFail($id);
        $project = Project::where('id', $issue->project_id)->get();
        // dd($issue);
        return view('admin.issue.show')
        ->with('project', $project)
        ->with('issue', $issue);
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
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
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
        

        $issue = new Issue;
        $issue->project_id = $request->project_id;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
        if(!empty($request->img)){
            $issue->img = $imgName;
            $img->move(public_path() . '/storage/img/issue', $imgName);
        }
        if(!empty($request->file)){
            $issue->file = $fileName;
            $file->move(public_path() . '/storage/doc/issue', $fileName);
        }
        // dd($issue);
        $issue->save();

        return redirect()->route('admin.project.show',$issue->project_id)->with('status', 'Issue created!');
    }

    public function edit($id)
    {
        $issue = Issue::with('worker')->findOrFail($id);
        $workers = User::all();

        return view('admin.issue.edit')
        ->with('issue', $issue)
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
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe pekerjaan harus diisi',
            'img.mimes' => 'Format gambar harus jpg,jpeg,png',
            'img.max' => 'Gambar tidak boleh lebih dari 2mb',
            'file.mimes' => 'Dokumen gambar harus doc,docx,pdf,xls,xlsx,ppt,pptx',
            'file.max' => 'Dokumen tidak boleh lebih dari 5mb',
        ];

        // ubah nama gambar
        if(!empty($request->img)){
            $img = $request->img;
            $imgName = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
        }
        
        if(!empty($request->file)){
            $file = $request->file;
            $fileName = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
        }

        $this->validate($request, $rules, $messages);

        $issue = Issue::find($id);
        $issue->name = $request->name;
        $issue->project_id = $request->project_id;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->status = $request->status;
        $issue->type_id = $request->type_id;
        if(!empty($request->img)){
            $issue->img = $imgName;
            $img->move(public_path() . '/storage/img/issue', $imgName);
        }
        if(!empty($request->file)){
            $issue->file = $fileName;
            $file->move(public_path() . '/storage/doc/issue', $fileName);
        }

        $issue->save();

        return redirect()->route('admin.project.show',$issue->project_id)->with('status', 'Issue updated!');
    }

    public function destroy($id)
    {
        Issue::find($id)->delete();
        return back()->with('status', 'Issue deleted!');
    }
}
