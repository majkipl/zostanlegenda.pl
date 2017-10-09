<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreContestRequest;
use App\Models\Contest;
use App\Models\Whence;
use App\Services\ContestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContestController extends Controller
{
    private $contestService;

    public function __construct(ContestService $contestService)
    {
        $this->contestService = $contestService;
    }

    public function form()
    {
        return view('contest/form', [
            'include_body_class' => 'form-contest',
            'whences' => Whence::getAllCached(),
        ]);
    }

    public function store(StoreContestRequest $request)
    {
        try {
            $application = $this->contestService->store(
                $request->validated(),
                $request
            );

            $this->contestService->sendMail($request->input('email'), ['id' => $application->id, 'token' => $application->token]);

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

    public function show(Contest $contest)
    {
        return view('contest/show', [
//            'include_body_class' => 'form-contest',
//            'whences' => Whence::getAllCached(),
            'contest' => $contest
        ]);
    }
}
