<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        dd('get all products');
    }

    public function category(Category $category)
    {
        $products = $category->products()->select(['id', 'name']);

        return response()->json([
            'total' => $products->count(),
            'rows' => $products->get()->toArray()
        ], Response::HTTP_OK);
    }
}
