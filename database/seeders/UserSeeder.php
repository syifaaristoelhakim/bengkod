<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Syifa Dokter',
                'alamat' => 'Jl ini',
                'no_hp' => '081234567',
                'role' => 'dokter',
                'email' => 'dokter_syifa@gmail.com',
                'password' => 'password' // password asli sebelum hash
            ],
            [
                'name' => 'Syifa Pasien',
                'alamat' => 'Jl itu',
                'no_hp' => '087654321',
                'role' => 'pasien',
                'email' => 'pasien_syifa@gmail.com',
                'password' => 'password' // password asli sebelum hash
            ],
        ];

        foreach($data as $d){
            User::create([
                'name' => $d['name'],
                'alamat' => $d['alamat'],
                'no_hp' => $d['no_hp'],
                'role' => $d['role'],
                'email' => $d['email'],
                'password' => Hash::make($d['password']),
            ]);
        }
    }
}
