<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Whence;
use App\Services\PromotionService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionController extends Controller
{
    private $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    public function form()
    {
        return view('promotion/form', [
            'include_body_class' => 'form-promotion',
            'categories' => Category::getAllCached(),
            'shops' => Shop::getAllCached(),
            'whences' => Whence::getAllCached(),
            'products' => Product::getAllCached()
        ]);
    }

    public function store(StorePromotionRequest $request): JsonResponse
    {
        try {
            $application = $this->promotionService->store(
                $request->validated(),
                $request
            );

            $this->promotionService->sendMail($request->input('email'), ['id' => $application->id, 'token' => $application->token]);

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route( 'front.thx.form')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
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
}
