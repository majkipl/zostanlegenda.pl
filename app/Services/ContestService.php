<?php

namespace App\Services;

use App\Http\Requests\StoreContestRequest;
use App\Mails\ApplicationMail;
use App\Models\Contest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContestService
{

    /** @var VideoService */
    private $videoService;

    public function __construct()
    {
        $this->videoService = new VideoService();
    }

    /**
     * @param array $data
     * @param StoreContestRequest $request
     * @return Contest
     * @throws Exception
     */
    public function store(array $data, StoreContestRequest $request): Contest
    {
        DB::beginTransaction();

        try {
            $application = new Contest($data);

            if( $request->file('img_tip') ) {
                $application->img_tip = $request->file('img_tip')->store('tips');
            }

            $params = $request->all();

            $application->whence_id = $params['whence'];

            $application->legal_1 = array_key_exists('legal_1', $params);
            $application->legal_2 = array_key_exists('legal_2', $params);
            $application->legal_3 = array_key_exists('legal_3', $params);
            $application->legal_4 = array_key_exists('legal_4', $params);

            $application->video_type = $this->videoService->getVideoServiceType($params['video_url']);
            $application->video_id = $this->videoService->getVideoIdFromUrl($params['video_url']);
            $application->video_image_id = $this->videoService->getVideoImageID($params['video_url']);

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
        Mail::to($email)->send(new ApplicationMail($data, 'emails.contest.html', 'emails.contest.text'));
    }
}
