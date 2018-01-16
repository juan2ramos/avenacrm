<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPointBase extends Model
{
    protected $table = 'point_product_base';
    protected $fillable = ['sale_value'];

    static function valueFormat($values)
    {
        foreach ($values as $key => $value) {
            $values[$key]['sale_value'] = intval(preg_replace('/[^0-9]+/', '', substr($value['sale_value'], 0, -2)), 10);;
        }
        return $values;
    }


}
