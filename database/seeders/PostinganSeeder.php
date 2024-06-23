<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Postingan;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostinganSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = Faker::create();
    $kategori = Kategori::all();
    $thumbnail = 'public/images/postingan/thumbnails/' . $faker->image('public/storage/images/postingan/thumbnails', 640, 480, null, false);

    $kategori->each(function ($kategori) use ($thumbnail) {
      Postingan::factory()->count(5)->create([
        'kategori_uuid' => $kategori->uuid,
        'thumbnail' => $thumbnail
      ]);
    });
  }
}
