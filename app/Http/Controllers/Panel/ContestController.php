<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestController extends Controller
{
    public function index()
    {
        return view('panel/contest/index');
    }
}
