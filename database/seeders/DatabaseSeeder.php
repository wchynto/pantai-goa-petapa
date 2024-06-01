<?php

namespace Database\Seeders;

use App\Models\Admin;
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

<<<<<<< HEAD
            KategoriSeeder::class,
            PostinganSeeder::class,
            KomentarSeeder::class,

            MediaSosialSeeder::class,
            ProfilSeeder::class,
=======
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::factory()->create([
            'nama' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
>>>>>>> 241c75617fa67d5aa05a35aeb73cff9c77a6f162
        ]);
    }
}
