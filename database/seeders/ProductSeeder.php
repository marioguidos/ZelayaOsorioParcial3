<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Product::create([
            'name' => 'pan',
            'description' => 'Integrla',
            'unitPrice' => 2.20,
            'existence' => 10,
            'warranty'=> '2022-06',
            'fk_seller'=>1
        ]);
        Product::create([
            'name' => 'pan',
            'description' => 'Integrla',
            'unitPrice' => '2.20',
            'existence' => '10',
            'warranty'=> '2022-06',
            'fk_seller'=>1
        ]);
        Product::create([
            'name' => 'pan',
            'description' => 'Integrla',
            'unitPrice' => '2.20',
            'existence' => '10',
            'warranty'=> '2022-06',
            'fk_seller'=>2,
        ]);
        Product::create([
            'name' => 'pan',
            'description' => 'Integrla',
            'unitPrice' => '2.20',
            'existence' => '10',
            'warranty'=> '2022-06',
            'fk_seller'=>2
        ]);
    }
}
