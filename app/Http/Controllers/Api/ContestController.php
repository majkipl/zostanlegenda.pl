<?php

namespace App\Http\Controllers\Api;

use App\Models\Contest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ContestController extends Controller
{
    public function verified(Request $request)
    {
        $searchKeyword = $request->input('phrase');

        $applications = Contest::whereNull('token')
            ->where(function ($query) use ($searchKeyword) {
                $query->where('title', 'LIKE', '%' . $searchKeyword . '%')
                    ->orWhere('message', 'LIKE', '%' . $searchKeyword . '%')
                    ->orWhere('firstname', 'LIKE', '%' . $searchKeyword . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $searchKeyword . '%');
            })
            ->orderBy('id', 'desc') // Sortowanie po ID malejąco
            ->skip($request->input('offset', 0))
            ->take($request->input('limit', 10))
            ->get();


        return response()->json([
            'total' => $applications->count(),
            'rows' => $applications->toArray()
        ], Response::HTTP_OK);
    }
}
