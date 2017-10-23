<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Whence extends Model
{
    protected $fillable = ['id', 'name'];

    public $timestamps = false;

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    /**
     * @return HasMany
     */
    public function contests(): HasMany
    {
        return $this->hasMany(Contest::class);
    }

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
}
