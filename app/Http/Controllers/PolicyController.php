<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        return view('policy/index', [
            'include_body_class' => 'policy'
        ]);
    }
}
