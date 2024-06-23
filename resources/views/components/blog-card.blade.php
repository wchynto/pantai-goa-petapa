<div class="mb-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg hover:bg-gray-300 dark:hover:bg-gray-700">
    <div class="relative">
        <img src="{{ Storage::url($item->thumbnail) }}" class="w-full h-44 rounded-t-lg object-cover" alt="Photo">
        <div class="absolute inset-0 bg-black opacity-25 rounded-t-lg"></div>
    </div>
    <div class="px-4 py-6">
        <h5 class="dark:text-gray-200 sm:text-sm font-bold mb-2"><a href="{{ url('/blog/' . $item['uuid']) }}"
                class="hover:underline">{{ $item->judul }}</a></h5>
        <p class="text-sm sm:text-xs text-gray-600 mb-4 dark:text-gray-300">
            {{ Str::limit(strip_tags($item->body), 100, '...') }}</p>
        <div class="flex items-center justify-between mb-1">
            <p class="text-sm sm:text-xs text-gray-600 dark:text-gray-300">{{ $item->created_at }}</p>
            <p class="text-sm sm:text-xs text-gray-600 dark:text-gray-300">Kategori: <a
                    href="#"
                    class="hover:underline">{{ $item->kategori->keterangan }}</a></p>
        </div>
    </div>
</div>
