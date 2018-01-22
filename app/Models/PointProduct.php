<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property float|int $value_total
 */
class PointProduct extends Model
{
    protected $table = 'point_product';

    /**
     * @return float|int
     */
    public function getValueTotalAttribute()
    {
        return $this->sale_value * $this->sold;
    }
}
