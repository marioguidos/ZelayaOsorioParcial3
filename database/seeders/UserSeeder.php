<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'seller',
            'email' => 'seller@seller.com',
            'email_verified_at' => now(),
            'password' => Hash::make('seller123'),
        ])->assignRole('seller');
        Seller::create([
            "dui" => "123123213",
            "address" => "Barrio el calvario",
            "nit" => "1234561234565",
            "id_usuario" => $user->id
        ]);
        $auditor = User::create([
            'name' => 'aud',
            'email' => 'aud@aud.com',
            'email_verified_at' => now(),
            'password' => Hash::make('aud123'),
        ])->assignRole('auditor');
        Seller::create([
            "dui" => "123123213",
            "address" => "Barrio el infierno",
            "nit" => "1234561234565",
            "id_usuario" => $auditor->id
        ]);
    }
}
