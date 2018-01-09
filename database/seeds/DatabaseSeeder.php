<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('¿Desea actualizar la migración antes seed, borrará todos los datos antiguos?')) {

        }
        $this->call(UserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(PointsSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(InventoriesSeeder::class);
    }

}
