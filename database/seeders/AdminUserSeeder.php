<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mbakpuji.com'],
            [
                'name' => 'Admin Mbak Puji',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
