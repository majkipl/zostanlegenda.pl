<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'category_id'];

    public $timestamps = false;

    /**
     * @return mixed
     */
    public static function getAllCached()
    {
        $cacheKey = (new self)->getTable();

        return Cache::remember($cacheKey, now()->addDay(365), function () {
            return self::all();
        });
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function scopeSearch($query, $search, $searchable)
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    switch ($column) {
                        case 'id':
                            $query->orWhere('id', 'LIKE', '%' . $search . '%');
                            break;
                        case 'name':
                            $query->orWhere('name', 'LIKE', '%' . $search . '%');
                            break;
                        case 'category.name':
                            $query->orWhereHas('category', function ($subQuery) use ($search) {
                                $subQuery->where('name', 'like', '%' . $search . '%');
                            });
                            break;
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
                    case 'name':
                        $query->where('name', 'LIKE', "%$value%");
                        break;
                    case 'category.name':
                        $query->orWhereHas('category', function ($subQuery) use ($value) {
                            $subQuery->where('name', 'like', '%' . $value . '%');
                        });
                        break;
                }
            }
        }

        return $query;
    }
}
