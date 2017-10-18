<?php

namespace App\Services;

use App\Http\Requests\StorePromotionRequest;
use App\Mails\ApplicationMail;
use App\Models\Promotion;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PromotionService
{

    /**
     * @param array $data
     * @param StorePromotionRequest $request
     * @return Promotion
     * @throws Exception
     */
    public function store(array $data, StorePromotionRequest $request): Promotion
    {
        DB::beginTransaction();

        try {
            $application = new Promotion($data);

            if( $request->file('img_receipt') ) {
                $application->img_receipt = $request->file('img_receipt')->store('public/receipts');
            }
            if( $request->file('img_ean') ) {
                $application->img_ean = $request->file('img_ean')->store('public/eans');
            }

            $params = $request->all();

            $application->category_id = $params['category'];
            $application->product_id = $params['product'];
            $application->shop_id = $params['shop'];
            $application->whence_id = $params['whence'];

            $application->legal_1 = array_key_exists('legal_1', $params);
            $application->legal_2 = array_key_exists('legal_2', $params);
            $application->legal_3 = array_key_exists('legal_3', $params);
            $application->legal_4 = array_key_exists('legal_4', $params);

            $application->token = Str::random(32);

            $application->save();

            DB::commit();

            return $application;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception('Nie można zapisać zgłoszenia');
        }
    }

    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendMail(string $email, array $data): void
    {
        Mail::to($email)->send(new ApplicationMail($data, 'emails.promotion.html', 'emails.promotion.text'));
    }
}
