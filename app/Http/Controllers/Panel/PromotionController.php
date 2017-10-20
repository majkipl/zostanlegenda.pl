<?php

namespace App\Http\Controllers\Panel;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function index()
    {
        return view('panel/promotion/index');
    }

    public function show(Request $request, int $id)
    {
        $promotion = Promotion::with(['category','product','whence','shop'])
            ->where('id','=',$id)->first();

        return view('panel/promotion/show', [
            'promotion' => $promotion
        ]);
    }
}
