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
        Seller::create([
            'dui' => '1447-4477848-478-7',
            'address' => 'coloniax',
            'nit' => '1231456-7',
            'id_usuario' => '1',
        ]);
        Seller::create([
            'dui' => '1447-4477848-478-7',
            'address' => 'coloniap',
            'nit' => '44812312-7',
            'id_usuario' => '1',
        ]);
        Seller::create([
            'dui' => '1447-4477848-478-7',
            'address' => 'coloniay',
            'nit' => '656147897-7',
            'id_usuario' => '2',
        ]);
        Seller::create([
            'dui' => '1447-1546488-123-7',
            'address' => 'coloniaz',
            'nit' => '32155654-7',
            'id_usuario' => '2',
        ]);
    }
}
