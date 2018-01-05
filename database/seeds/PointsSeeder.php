<?php

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $points = [
            'Calle 80',
            'Alkosto',
            'Titan Plaza',
            'Santa fe ',
            'Calle 170',
        ];
        factory(Point::class, 5)->create()->each(function ($i, $j) use ($points) {
            $i->name = $points[$j];
            $i->save();
        });
    }
}
