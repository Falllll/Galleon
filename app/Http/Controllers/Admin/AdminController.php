<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all()->count();
        $customers = Customer::all()->count();
        $users = User::all()->count();

        return view('admin.index')
        ->with('projects', $projects)
        ->with('customers', $customers)
        ->with('users', $users);
    }

    public function edit()
    {

        return view('admin.account');
    }

    public function update(Request $request)
    {
        /**
         * Change the current password
         * @param Request $request
         * @return Renderable
         */
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

//        Validasi password baru
        $request->validate([
            'new_password' => 'nullable|min:6',
            'confirm_password' => ['same:new_password'],
        ]);

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->back()->with('status', 'Profile updated!');
    }
}
