<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class CommentController extends Controller
{
    public function show($id)
    {
        $project = Project::with('customer')->findOrFail($id);

        return view('dashboard.project.comment')
        ->with('project', $project);
    }
}
