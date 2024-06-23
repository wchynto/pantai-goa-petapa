<form method="POST" action="{{ route('tiket.update', $item->uuid) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2 sm:col-span-1">
      <label for="jenis_kendaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
        Kendaraan</label>
      <input type="text" name="jenis_kendaraan" id="jenis_kendaraan"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan jenis kendaraan" value="{{ $item->kendaraan->jenis_kendaraan }}" required>
      @error('jenis_kendaraan')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
      <input type="text" name="harga" id="harga"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan harga" value="{{ $item->harga }}" required>
      @error('harga')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
      <input type="text" name="keterangan" id="keterangan"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan keterangan" value="{{ $item->keterangan }}" required>
      @error('keterangan')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
      <img class="w-20 h-20 rounded-lg shadow-lg mb-2"
        src="{{ strpos($item->thumbnail, 'tiket/thumbnails') ? Storage::url($item->thumbnail) : asset($item->thumbnail) }}"
        alt="{{ $item->kendaraan->jenis_kendaraan }}">
      <input type="file" name="thumbnail" id="thumbnail"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      @error('thumbnail')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <x-admin.submit-cancel-button submit="Update" url="{{ route('tiket.index') }}"></x-admin.submit-cancel-button>
</form>
