<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengunjungs = Pengunjung::all();
        $tikets = Tiket::all();

        $pengunjungs->each(function (Pengunjung $pengunjung) use ($tikets): void {
            $selectedTikets = $tikets->random(2);

            $transaksiData = [
                'pengunjung_uuid' => $pengunjung->uuid,
                'total_harga' => $selectedTikets->sum('harga'),
                'total_bayar' => $selectedTikets->sum('harga'),
                'tanggal_transaksi' => now(),
            ];

            $transaksi = Transaksi::create($transaksiData);

            $transaksiTiketData = $selectedTikets->mapWithKeys(function ($tiket) use ($transaksi) {
                return [
                    $tiket->uuid => [
                        'jumlah_penumpang' => rand(1, 5),
                        'tiket_uuid' => $tiket->uuid,
                        'transaksi_uuid' => $transaksi->uuid,
                    ]
                ];
            })->toArray();

            $transaksi->tiket()->attach($transaksiTiketData);
        });
    }
}
