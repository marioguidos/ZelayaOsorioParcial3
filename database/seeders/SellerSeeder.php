<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = Seller::create([
            'Dui' => '1447-4477848-478-7',
            'adress' => 'coloniax',
            'nit' => '44878978-7',
            'id_usuario' => '1',
        ]);
    }
}
