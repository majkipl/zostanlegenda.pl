<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Whence extends Model
{
    protected $fillable = ['id', 'name'];

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function contests()
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
