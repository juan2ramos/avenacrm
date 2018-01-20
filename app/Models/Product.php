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
    protected $fillable = ['name', 'sale_value', 'description','see_description'];
    protected $casts = [
        'see_description' => 'boolean',
    ];

    public function points()
    {
        return $this->belongsToMany(Point::class, 'point_product_base')
            ->withPivot('sale_value')->as('stock');
    }

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

    public function getPointSaleValueAttribute()
    {
        return $this->moneyFormat($this->stock->sale_value);
    }

    public function getSaleValueAttribute($value)
    {
        return $this->moneyFormat($value);
    }

    private function moneyFormat($value)
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%n', $value);
    }
    public function getSaleValueFormatAttribute(){
        return intval(preg_replace('/[^0-9]+/', '', substr($this->sale_value, 0, -2)), 10);
    }

    public function setSaleValueAttribute($value)
    {
        $this->attributes['sale_value'] = intval(preg_replace('/[^0-9]+/', '', substr($value, 0, -2)), 10);
    }
}
