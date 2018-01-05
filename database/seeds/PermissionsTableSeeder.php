<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

    }
}
