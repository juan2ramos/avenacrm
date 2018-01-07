<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property string $sale_value
 */
class Product extends Model
{
    protected $fillable = ['name', 'sale_value', 'description'];

    public function getSaleValueAttribute($value)
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%n', $value);
    }

    public function setSaleValueAttribute($value)
    {
        $this->attributes['sale_value'] = intval(preg_replace('/[^0-9]+/', '', substr($value, 0, -2)), 10);
    }
}
