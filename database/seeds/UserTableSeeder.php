<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan',
            'last_name' => 'Ramos',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
