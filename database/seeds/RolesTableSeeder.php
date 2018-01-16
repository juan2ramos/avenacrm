<?php

use App\Models\Permission;
use App\User;
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

        Role::create(['name' => 'Gerente']);
        Role::create(['name' => 'Profesional']);
        Role::create(['name' => 'Supervisor Bodega']);
        Role::create(['name' => 'Supervisor Punto']);
        Role::create(['name' => 'Auxiliar']);

        $user = User::find(1);
        $user->assignRole('Admin');
        $user = User::find(2);
        $user->assignRole('Admin');

        /* $role = Role::create(['name' => 'user']);
         $role->givePermissionTo('comment_create');*/
    }
}
