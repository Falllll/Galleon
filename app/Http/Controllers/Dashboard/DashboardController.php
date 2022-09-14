<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Project;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $boards = Board::all()->count();
        $users = User::all()->count();
        $projects = Project::all()->count();
        $customers = Customer::all()->count();

        return view('dashboard.index', compact(['projects', 'users', 'boards', 'customers']));
    }

    public function edit()
    {
        return view('dashboard.account.index');
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
