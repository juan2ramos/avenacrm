<?php

use App\Models\Inventory;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = Carbon::create(2017, 12, 31, 0)->diffInDays(Carbon::now()->subDays(1), false);
        echo $i;
        Product::all()->each(function ($product) use ($i) {

            factory(Inventory::class, $i)->create()->each(function ($itemFactory, $j) use ($product) {
                $itemFactory->date = Carbon::now()->subDays($j+1);
                $itemFactory->product_id = $product->id;
                $itemFactory->save();
            });

        });


    }
}
