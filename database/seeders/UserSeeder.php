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
        User::factory()->create([
            'role' => '1',
            'nama_user' => 'admin',
            'name' => 'admin',
            'email' => 'admin@muriabatik.com',
            'password' => Hash::make('admin123'),
        ]);
        User::factory()->create([
            'role' => '2',
            'nama_user' => 'produksi',
            'name' => 'produksi',
            'email' => 'produksi@muriabatik.com',
            'password' => Hash::make('produksi123'),
        ]);
        User::factory()->create([
            'role' => '2',
            'nama_user' => 'owner',
            'name' => 'owner',
            'email' => 'owner@muriabatik.com',
            'password' => Hash::make('owner123'),
        ]);
    }
}
