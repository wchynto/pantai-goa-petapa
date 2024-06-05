<form method="POST" action="{{ route('tiket.store') }}">
  @csrf
  @method('POST')
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2 sm:col-span-1">
      <label for="kendaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
        Kendaraan</label>
      <select id="countries"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="kendaraan_uuid">
        <option selected disabled>Pilih jenis kendaraan</option>
        @foreach ($kendaraan as $k)
          <option value="{{ $k->uuid }}">
            {{ $k->keterangan }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
      <input type="text" name="harga" id="harga"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan harga" required>
    </div>
    <div class="col-span-2">
      <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
      <input type="text" name="keterangan" id="keterangan"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan keterangan" required>
    </div>
  </div>

  <x-admin.submit-cancel-button submit="Tambah" url="{{ url('admin/tiket') }}"></x-admin.submit-cancel-button>
</form>
