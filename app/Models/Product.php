<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function getSaleValueAttribute($value)
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%(#10n', $value);

    }
}
