<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Tiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kendaraan = Kendaraan::all();

        Tiket::create([
            'keterangan' => 'Tiket masuk mobil',
            'harga' => 15000,
            'kendaraan_uuid' => $kendaraan->firstWhere('keterangan', 'Mobil')->uuid
        ]);

        Tiket::create([
            'keterangan' => 'Tiket masuk motor',
            'harga' => 5000,
            'kendaraan_uuid' => $kendaraan->firstWhere('keterangan', 'Motor')->uuid
        ]);

        Tiket::create([
            'keterangan' => 'Tiket masuk sepeda',
            'harga' => 2000,
            'kendaraan_uuid' => $kendaraan->firstWhere('keterangan', 'Sepeda')->uuid
        ]);

        Tiket::create([
            'keterangan' => 'Tiket masuk berjalan kaki',
            'harga' => 1000,
            'kendaraan_uuid' => $kendaraan->firstWhere('keterangan', 'Berjalan Kaki')->uuid
        ]);
    }
}
