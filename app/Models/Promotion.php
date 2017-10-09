<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'id', 'firstname', 'lastname', 'birthday', 'address',
        'city', 'zip', 'email', 'phone', 'receiptnb',
        'img_receipt', 'img_ean', 'legal_1', 'legal_2',
        'legal_3', 'legal_4', 'category_id', 'product_id',
        'shop_id', 'whence_id', 'token'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getBirthdayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
