<?php

namespace App\Http\Controllers\Panel;

use App\Models\Shop;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        return view('panel/shop/index');
    }

    public function create()
    {
        return view('panel/shop/form', []);
    }

    public function show(Shop $shop)
    {
        return view('panel/shop/show', [
            'shop' => $shop
        ]);
    }

    public function edit(Shop $shop)
    {
        return view('panel/shop/form', [
            'shop' => $shop
        ]);
    }
}
