<?php

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'Norte',
            'Sur',
            'Occidente',
            'Oriente',
            'Centro'
        ];
        foreach ($areas as $area) {
            Area::create([
                'name' => $area,
            ]);
        }
    }
}
