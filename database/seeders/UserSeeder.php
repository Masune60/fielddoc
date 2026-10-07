<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin_penagihan',
            'nama_lengkap' => 'Admin Penagihan',
            'email' => 'admin@diancahayaprima.com',
            'password' => Hash::make('password123'),
            'role' => 'ADMIN',
        ]);

        User::create([
            'username' => 'spv_lapangan',
            'nama_lengkap' => 'Supervisor Lapangan',
            'email' => 'spv@diancahayaprima.com',
            'password' => Hash::make('password123'),
            'role' => 'SUPERVISOR',
        ]);

        User::create([
            'username' => 'worker',
            'nama_lengkap' => 'Worker Lapangan',
            'email' => 'worker@diancahayaprima.com',
            'password' => Hash::make('password123'),
            'role' => 'WORKER',
        ]);
    }
}
