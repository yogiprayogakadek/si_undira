<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
                'nama' => 'Petugas Rekam Medis',
                'email' => 'petugas@gmail.com',
                'password' => Hash::make('tabanan2023'),
                'jabatan' => 'petugas_rm'
            ],
            [
                'nama' => 'Kepala Rekam Medis',
                'email' => 'kepalarm@gmail.com',
                'password' => Hash::make('tabanan2023'),
                'jabatan' => 'kepala_rm'
            ]
        ];

        foreach($data as $data) {
            User::create($data);
        }
    }
}
