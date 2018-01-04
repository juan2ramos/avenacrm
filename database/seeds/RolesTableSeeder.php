<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);
        $role->syncPermissions(Permission::all());

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('comment_create');
    }
}
