<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function promotion(Promotion $promotion, string $token)
    {
        if (!$token || $promotion->token !== $token) {
            abort(404);
        }

        $promotion->token = null;
        $promotion->save();

        return redirect()->route('front.thx.promo');
    }

    public function contest(Contest $contest, string $token)
    {
        if (!$token || $contest->token !== $token) {
            abort(404);
        }

        $contest->token = null;
        $contest->save();

        return redirect()->route('front.thx.contest');
    }
}
