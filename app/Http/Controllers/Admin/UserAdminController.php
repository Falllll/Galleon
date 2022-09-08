<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Position;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::with('position')->whereRoleIs('user')->get();

        return view('admin.user.index')
        ->with('users', $users);
    }

    public function create()
    {
        $positions = Position::all();

        return view('admin.user.create')
        ->with('positions', $positions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'position_id' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position_id' => $request->position_id,
            'password' => Hash::make($request->password),
        ])->attachRole('user');

        // dd($user);
        $user->save();

        return redirect('admin/user')->with('status', 'Account created!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $positions = Position::all();

        return view('admin.user.edit')
        ->with('user',$user)
        ->with('positions', $positions);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'position_id' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama  harus diisi',
            'name.max' => 'Nama  terlalu panjang',
            'position_id.required' => 'Nama pekerja harus diisi',
            'position_id.required' => 'Tipe pekerjaan harus diisi',
        ];

        

        $this->validate($request, $rules, $messages);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position_id = $request->position_id;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('admin/user')->with('status', 'Account updated!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('status', 'User deleted!');
    }
    
}
