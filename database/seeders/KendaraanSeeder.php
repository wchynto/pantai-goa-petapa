<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::create([
            'keterangan' => 'Mobil'
        ]);

        Kendaraan::create([
            'keterangan' => 'Motor'
        ]);

        Kendaraan::create([
            'keterangan' => 'Sepeda'
        ]);

        Kendaraan::create([
            'keterangan' => 'Berjalan Kaki'
        ]);
    }
}
