<form action="{{ route('pengunjung.update', ['pengunjung' => $item->uuid]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2 sm:col-span-1">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
      <input type="text" name="nama" id="nama"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan nama" required="" value="{{ $item->nama }}">
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
        Telepon</label>
      <input type="text" name="no_telepon" id="no_telepon"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan no. telepon" required=""
        value="{{ $item->user->no_telepon ?? $item->guest->no_telepon }}">
    </div>
    <div class="col-span-2">
      <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
      <select name="tipe" id="tipe"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        required="">
        @if ($item->user)
          <option value="member">
            Member</option>
        @else
          <option value="guest">
            Guest</option>
        @endif
      </select>
    </div>
  </div>

  <x-admin.add-cancel-button url="{{ route('pengunjung.index') }}"></x-admin.add-cancel-button>
</form>
