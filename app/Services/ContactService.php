<?php

namespace App\Services;

use App\Http\Requests\StoreContestRequest;
use App\Mails\ApplicationMail;
use App\Models\Contest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactService
{
    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendMail(string $email, array $data): void
    {
        Mail::to($email)->send(new ApplicationMail($data, 'emails.contact.html', 'emails.contact.text'));
    }
}
