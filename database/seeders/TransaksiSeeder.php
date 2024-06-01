<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\TransaksiTiket;
use App\Repositories\TransaksiRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengunjung = Pengunjung::all();
        $tiket = Tiket::all();

        $pengunjung->each(function (Pengunjung $pengunjung) use ($tiket): void {

            $tiket = $tiket->random();

            $transaksiTiketData = [
                [
                    'tiket_uuid' => $tiket->uuid
                ],
                // [
                // add another tiket
                // ]
            ];

            $transaksiData = [
                'pengunjung_uuid' => $pengunjung->uuid,
                'total_harga' => $tiket->harga * count($transaksiTiketData),
                'total_bayar' => $tiket->harga * count($transaksiTiketData),
                'tanggal_transaksi' => now(),
            ];

            $transaksi = Transaksi::create($transaksiData);

            $transaksi->tiket()->attach($transaksiTiketData);
        });
    }
}
