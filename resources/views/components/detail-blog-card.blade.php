@php
  use Illuminate\Support\Str;
  use Faker\Factory as Faker;
  use App\Helpers\CustomHelper;

  $faker = Faker::create();

  $uuid = Str::uuid();
  $judul = $faker->sentence;
  $thumbnail = 'background-jumbotron.png';
  $created_at = $faker->date('m/d/Y');
  $body = $faker->paragraph;
  $kategori = [
      [
          'uuid' => Str::uuid(),
          'keterangan' => 'Insprirasi',
      ],
  ];
@endphp

<p class="text-sm sm:text-xs text-gray-600 dark:text-gray-300 mb-4">{{ $created_at }}</p>
<div class="relative">
  <img src="{{ asset('images/' . $thumbnail) }}" class="w-full h-96 rounded-lg object-cover" alt="Photo">
</div>
<div class="mb-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg">
  <div class="px-4 py-6 mt-10">
    <div class="flex items-center justify-between mb-2 w-5/6">
      <p class="text-xl sm:text-xs text-gray-900 font-extrabold dark:text-gray-300">Kategori: <a
        href="{{ url('/blog/kategori/' . $kategori[0]['uuid']) }}"
        class="hover:underline">{{ $kategori[0]['keterangan'] }}</a></p>
    </div>
    <p class="text-justify text-xl sm:text-xs text-gray-600 mb-4 dark:text-gray-300">{{ Str::limit(strip_tags($body), 200, '...') }}</p>
  </div>
</div>