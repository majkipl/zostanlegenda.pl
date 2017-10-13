<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\IndexPromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PromotionController extends Controller
{
    public function index(IndexPromotionRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');

        $query = Promotion::with(['shop','category','product','whence'])->search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $applicationsCount = $query->count('id');
        $applications = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $applicationsCount,
            'rows' => $applications
        ], Response::HTTP_OK);
    }
}
