<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards', [
            'boards' => auth()->user()->boards
        ]);
    }

    public function show()
    {
        return Inertia::render('Board');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        Board::create([
            'user_id' => auth()->id(),
            'name' => request('name')
        ]);

        return redirect()->back();
    }
}
