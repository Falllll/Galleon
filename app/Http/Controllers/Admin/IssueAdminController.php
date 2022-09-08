<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Issue;

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

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'worker_id' => 'required',
            'type_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe pekerjaan harus diisi',
        ];

        $this->validate($request, $rules, $messages);

        $issue = new Issue;
        $issue->project_id = $request->project_id;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->type_id = $request->type_id;
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
        ];

        $messages = [
            'name.required' => 'Nama Issue harus diisi',
            'name.max' => 'Nama Issue terlalu panjang',
            'worker_id.required' => 'Nama pekerja harus diisi',
            'type_id.required' => 'Tipe pekerjaan harus diisi',
        ];

        

        $this->validate($request, $rules, $messages);

        $issue = Issue::find($id);
        $issue->name = $request->name;
        $issue->project_id = $request->project_id;
        $issue->description = $request->description;
        $issue->worker_id = $request->worker_id;
        $issue->status = $request->status;
        $issue->type_id = $request->type_id;

        $issue->save();

        return redirect()->route('admin.project.show',$issue->project_id)->with('status', 'Issue updated!');
    }

    public function destroy($id)
    {
        Issue::find($id)->delete();
        return back()->with('status', 'Issue deleted!');
    }
}
