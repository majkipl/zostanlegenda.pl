<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddProductRequest;
use App\Http\Requests\Api\IndexProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(IndexProductRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');

        $query = Product::with(['category'])->search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $itemsCount = $query->count('id');
        $items = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $itemsCount,
            'rows' => $items
        ], Response::HTTP_OK);
    }

    public function add(AddProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = new Product($request->validated());
            $params = $request->all();

            $product->category_id = $params['category_id'];

            $product->save();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojego zgłoszenia, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    public function update(UpdateProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($request->input('id'));
            $product->fill($request->validated());

            $product->save();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy zaktualizować rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function delete(Product $product): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Rekord został pomyślnie usunięty.'
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy usunąć rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function category(Category $category)
    {
        // todo: tu dać cacheowanie

        $products = $category->products()->select(['id', 'name']);

        return response()->json([
            'total' => $products->count(),
            'rows' => $products->get()->toArray()
        ], Response::HTTP_OK);
    }
}
