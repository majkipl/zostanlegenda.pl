<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddCategoryRequest;
use App\Http\Requests\Api\IndexCategoryRequest;
use App\Http\Requests\Api\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\SlugService;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $slugService;

    public function __construct(SlugService $slugService)
    {
        $this->slugService = $slugService;
    }

    public function index(IndexCategoryRequest $request)
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');

        $query = Category::search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $categoriesCount = $query->count('id');
        $categories = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $categoriesCount,
            'rows' => $categories
        ], Response::HTTP_OK);
    }

    public function add(AddCategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $category = new Category($request->validated());
            $params = $request->all();

            if ($params['slug'] !== null) {
                $category->slug = $this->slugService->generateUniqueSlug($params['slug']);
            } else {
                $category->slug = $this->slugService->generateUniqueSlug($params['name']);
            }

            $category->save();

            DB::commit();

            Cache::forget('categories');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.category')
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

    public function update(UpdateCategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $category = Category::findOrFail($request->input('id'));
            $category->fill($request->validated());

            $params = $request->all();

            if ($params['slug'] !== null) {
                $category->slug = $this->slugService->generateUniqueSlug($params['slug'], $category->slug);
            } else {
                $category->slug = $this->slugService->generateUniqueSlug($params['name'], $category->slug);
            }

            $category->save();

            DB::commit();

            Cache::forget('categories');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.category')
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

    public function delete(Category $category): JsonResponse
    {
        DB::beginTransaction();

        try {
            $category->delete();

            DB::commit();

            Cache::forget('categories');

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
}
