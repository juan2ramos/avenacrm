<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $points
 */
class Area extends Model
{

    protected $fillable = ['name'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
