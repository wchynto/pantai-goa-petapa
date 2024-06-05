<form action="{{ route('pengunjung.store') }}" method="POST">
  @csrf
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

  <x-admin.submit-cancel-button submit="Tambah" url="{{ route('pengunjung.index') }}"></x-admin.submit-cancel-button>
</form>

<script>
  let tipe = $('#tipe').val();

  $('#tipe').change(function() {
    tipe = $(this).val();

    if (tipe === 'user') {
      $('#email').parent().removeClass('hidden');
      $('#password').parent().removeClass('hidden');
      $('password').attr('required', '');
      $('email').attr('required', '');
    } else {
      $('#email').parent().addClass('hidden');
      $('#password').parent().addClass('hidden');
      $('password').removeAttr('required');
      $('email').removeAttr('required');
    }
  });
</script>
