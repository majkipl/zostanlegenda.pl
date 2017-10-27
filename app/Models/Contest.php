<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contest extends Model
{
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'birthday',
        'title', 'message', 'img_tip', 'video_url', 'video_type',
        'video_id', 'video_image_id', 'legal_1', 'legal_2',
        'legal_3', 'legal_4', 'whence_id', 'token', 'week'];

    /**
     * @return BelongsTo
     */
    public function whence(): BelongsTo
    {
        return $this->belongsTo(Whence::class);
    }

    /**
     * @param $value
     * @return void
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    /**
     * @param $value
     * @return string
     */
    public function getBirthdayAttribute($value): string
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    /**
     * @param $query
     * @param $search
     * @param $searchable
     * @return mixed
     */
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
                    }
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
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
                }
            }
        }

        return $query;
    }
}
