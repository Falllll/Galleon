<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();

        return view('admin.position.index')
        ->with('positions', $positions);
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:20',
        ];

        $messages = [
            'name.required' => 'Nama jabatan terlalu panjang'
        ];

        $this->validate($request, $rules, $messages);

        $position = new Position;
        $position->name = $request->name;
        $position->save();

        return redirect('admin/position')->with('status', 'Position created');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);

        return view('admin.position.edit')
        ->with('position', $position);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:50',
        ];

        $messages = [
            'name.required' => 'Nama jabatan terlalu panjang'
        ];

        $this->validate($request, $rules, $messages);

        $position = Position::find($id);
        $position->name = $request->name;
        $position->save();

        return redirect('admin/position')->with('status', 'Position created');
    }

    public function destroy($id)
    {
        Position::find($id)->delete();

        return back()->with('status', 'Position Deleted');
    }
}
