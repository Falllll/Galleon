<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Project;
use App\Models\User;
use App\Models\Customer;

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
}
