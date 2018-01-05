<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'Avena',
            'Palitos de queso',
            'Pan de bonos',
            'almojabanas',
        ];
        factory(Product::class, 4)->create()->each(function ($i, $j) use ($products) {
            $i->name = $products[$j];
            $i->save();
        });
    }
}
