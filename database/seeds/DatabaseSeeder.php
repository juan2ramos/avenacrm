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
            $this->call(UserTableSeeder::class);
        }
    }

}
