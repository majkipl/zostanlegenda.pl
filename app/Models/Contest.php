<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'birthday',
        'title', 'message', 'img_tip', 'video_url', 'video_type',
        'video_id', 'video_image_id', 'legal_1', 'legal_2',
        'legal_3', 'legal_4', 'whence_id'];

    public function whence()
    {
        return $this->belongsTo(Whence::class);
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getBirthdayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    public function scopeSearch($query, $search, $searchable)
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    switch ($column) {
                        case 'id':
                            $query->orWhere('id', '=', '%' . $search . '%');
                            break;
                        case 'firstname':
                        case 'lastname':
                        case 'email':
                        case 'birthday':
                        case 'title':
                        case 'message':
                        case 'img_tip':
                        case 'video_url':
                        case 'video_type':
                        case 'video_id':
                        case 'video_image_id':
                            $query->orWhere($column, 'LIKE', '%' . $search . '%');
                            break;
                        case 'whence.name':
                            $query->orWhereHas('whence', function ($subQuery) use ($search) {
                                $subQuery->where('name', 'like', '%' . $search . '%');
                            });
                            break;
//                        case 'legal_1':
//                        case 'legal_2':
//                        case 'legal_3':
//                        case 'legal_4':
                    }
                }
            });
        }

        return $query;
    }

    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            $filters = json_decode($filter, true);

            foreach ($filters as $column => $value) {
                switch ($column) {
                    case 'id':
                        $query->where('id', $value);
                        break;
                    case 'firstname':
                    case 'lastname':
                    case 'email':
                        case 'birthday':
                    case 'title':
                    case 'message':
                    case 'img_tip':
                    case 'video_url':
                    case 'video_type':
                    case 'video_id':
                    case 'video_image_id':
                        $query->where($column, 'LIKE', "%$value%");
                        break;
                    case 'whence.name':
                        $query->orWhereHas('whence', function ($subQuery) use ($value) {
                            $subQuery->where('name', 'like', '%' . $value . '%');
                        });
                        break;
//                  case 'legal_1':
//                  case 'legal_2':
//                  case 'legal_3':
//                  case 'legal_4':
                }
            }
        }

        return $query;
    }
}
