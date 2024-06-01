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
        $this->call([
            PengunjungSeeder::class,
            KendaraanSeeder::class,
            TiketSeeder::class,
            TransaksiSeeder::class,

            KategoriSeeder::class,
            PostinganSeeder::class,
            KomentarSeeder::class,

            MediaSosialSeeder::class,
            ProfilSeeder::class,
        ]);
    }
}
