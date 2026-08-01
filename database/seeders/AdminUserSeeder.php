<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@ongrail.org',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'phone' => '+229 00 00 00 00',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Rédacteur',
            'email' => 'redacteur@ongrail.org',
            'password' => Hash::make('redacteur123'),
            'role' => 'redacteur',
            'phone' => '+229 00 00 00 01',
            'is_active' => true,
        ]);
    }
}
