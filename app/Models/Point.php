<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $area
 * @property mixed $products
 */
class Point extends Model
{
    protected $fillable = ['name', 'address'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function stockDay()
    {
        return $this->belongsToMany(Product::class)->withPivot('date', 'sale_value', 'available', 'sold')->wherePivot('date', Carbon::now()->toDateString());
    }

    public function productsAvailable()
    {
        return $this->belongsToMany(Product::class, 'point_product_base')->as('avail')->withPivot('sale_value');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'point_product_base')->withPivot('sale_value')->as('stock');
    }

    public function stockYesterday()
    {
        return $this->belongsToMany(Product::class)->withPivot('date', 'available', 'sold', 'sale_value')->wherePivot('date', Carbon::yesterday()->toDateString());
    }

    public function productsPoint()
    {
        return $this->belongsToMany(Product::class)->withPivot('sold', 'available', 'sale_value');
    }
}
