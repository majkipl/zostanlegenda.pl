<?php

namespace App\Http\Controllers\Panel;

use App\Models\Contest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestController extends Controller
{
    public function index()
    {
        return view('panel/contest/index');
    }

    public function show(Request $request, int $id)
    {
        $contest = Contest::with(['whence'])
            ->where('id','=',$id)->first();

        return view('panel/contest/show', [
            'contest' => $contest
        ]);
    }
}
