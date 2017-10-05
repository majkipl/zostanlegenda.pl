<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThxController extends Controller
{
    public function promotion()
    {
        return view('thx/promotion', [
            'include_body_class' => 'thx'
        ]);
    }

    public function contest()
    {
        return view('thx/contest', [
            'include_body_class' => 'thx'
        ]);
    }

    public function form()
    {
        return view('thx/form', [
            'include_body_class' => 'thx'
        ]);
    }
}
