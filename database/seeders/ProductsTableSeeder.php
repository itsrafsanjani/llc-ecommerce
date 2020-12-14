<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(20)->create();

        $products = Product::select('id')->get();

        foreach ($products as $product) {
            $product->addMediaFromUrl('https://via.placeholder.com/640x480.png/00bbcc?text=similique')->toMediaCollection('products');
        }
    }
}
