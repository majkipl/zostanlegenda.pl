<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'birthday', 'title', 'message', 'img_tip',
        'video_url', 'video_type', 'video_id', 'video_image_id', 'legal_1', 'legal_2', 'legal_3', 'legal_4', 'whence_id'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getBirthdayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
