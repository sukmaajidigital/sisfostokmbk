<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(KategoriBahanSeeder::class);
        $this->call(KeperluanSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(BahanMasukSeeder::class);
        $this->call(BahanKeluarSeeder::class);
    }
}
