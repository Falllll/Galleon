<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Customer;
use App\Models\User;

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
}
