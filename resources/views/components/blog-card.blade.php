@php
  use Illuminate\Support\Str;
  use Faker\Factory as Faker;
  use App\Helpers\CustomHelper;

  $faker = Faker::create();

  $items = [];

  for ($i = 0; $i < 8; $i++) {
      $uuid = Str::uuid();
      $judul = $faker->sentence;
      $created_at = $faker->date('m/d/Y');
      $body = $faker->paragraph;
      $kategori = [
          [
              'uuid' => Str::uuid(),
              'keterangan' => 'Insprirasi',
          ],
      ];

      $items[] = [
          'uuid' => $uuid,
          'judul' => $judul,
          'thumbnail' => 'background-jumbotron.png',
          'created_at' => $created_at,
          'body' => $body,
          'kategori' => $kategori,
      ];
  }
@endphp

@foreach ($items as $item)
  <div class="mb-4 rounded-lg bg-white shadow-lg hover:bg-gray-100">
    <div class="relative">
      <img src="{{ asset('images/' . $item['thumbnail']) }}" class="w-full h-44 rounded-t-lg object-cover" alt="Photo">
      <div class="absolute inset-0 bg-black opacity-25"></div>
    </div>
    <div class="px-4 py-6">
      <h5 class="sm:text-sm font-bold mb-2"><a href="{{ url('/blog/' . $item['uuid']) }}"
          class="hover:underline">{{ $item['judul'] }}</a></h5>
      <p class="text-sm sm:text-xs text-gray-600 mb-4">{{ Str::limit(strip_tags($item['body']), 100, '...') }}</p>
      <div class="flex items-center justify-between mb-1">
        <p class="text-sm sm:text-xs text-gray-600">{{ $item['created_at'] }}</p>
        <p class="text-sm sm:text-xs text-gray-600">Kategori: <a
            href="{{ url('/blog/kategori/' . $kategori[0]['uuid']) }}"
            class="hover:underline">{{ $item['kategori'][0]['keterangan'] }}</a></p>
      </div>
    </div>
  </div>
@endforeach
