<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardList;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
//    public function store(Board $board)
//    {
//      request()->validate([
//        'name' => ['required']
//      ]);
//
//      BoardList::create([
//        'board_id' => $board->id,
//        'user_id' => auth()->id(),
//        'name' => request('name')
//      ]);
//
//      return redirect()->back();
//    }

        public function store(Board $board)
    {
        request()->validate([
            'name' => ['required']
        ]);

        BoardList::create([
            'board_id' => $board->id,
            'user_id' => auth()->id(),
            'name' => request('name')
        ]);

        return redirect()->back();
    }
}
