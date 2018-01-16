<?php

namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_point',
            'add_point',
            'edit_point',
            'delete_point',

            'view_product',
            'add_product',
            'edit_product',
            'delete_product',

            'view_inventory',
            'add_inventory',
            'edit_inventory',
            'delete_inventory',

            'view_user',
            'add_user',
            'edit_user',
            'delete_user',

            'view_employ',
            'add_employ',
            'edit_employ',
            'delete_employ',

            'view_area',
            'add_area',
            'edit_area',
            'delete_area',

           /* 'view_',
            'add_',
            'edit_',
            'delete_',*/


        ];
    }


}
