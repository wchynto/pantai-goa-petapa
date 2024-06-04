<form method="POST">
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2 sm:col-span-1">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
      <input type="text" name="nama" id="nama"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan nama" required="">
    </div>
    <div class="col-span-2 sm:col-span-1">
      <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
        Telepon</label>
      <input type="text" name="no_telepon" id="no_telepon"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Masukkan no. telepon" required="">
    </div>
    <div class="col-span-2">
      <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
      <select name="tipe" id="tipe"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        required="">
        <option value="guest" selected>Guest</option>
        <option value="member">Member</option>
      </select>
    </div>
  </div>

  <x-admin.add-cancel-button url="{{ url('admin/pengunjung') }}"></x-admin.add-cancel-button>
</form>
