<h1 class="text-2xl font-bold block md:text-3xl text-center md:text-left">{{ $item->judul }}</h1>
<p class="text-sm sm:text-xs text-gray-600 my-1 dark:text-white">{{ $item->created_at }}</p>
<p class="text-xl sm:text-xs text-gray-600 mb-4 dark:text-white">Kategori: <a href="#" class="hover:underline">{{ $item->kategori->keterangan }}</a></p>
<div class="relative">
  <img src="{{ Storage::url($item->thumbnail) }}" class="w-full h-96 rounded-lg object-cover" alt="Photo">
</div>
<div class="mb-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg">
  <div class="px-4 py-6 mt-10">
    <div class="flex items-center justify-between mb-2 w-5/6">
    </div>
    <p class="text-justify lg:text-base sm:text-xs text-gray-600 mb-4 dark:text-gray-300 lg:px-4">{!! $item->body !!}</p>
  </div>
</div>