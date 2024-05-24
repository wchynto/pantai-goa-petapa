<!-- Main modal -->
<div id="add-transaction-modal" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden top-4 fixed md:top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Tambah Transaksi Baru
        </h3>
        <button type="button"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-toggle="add-transaction-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <form class="p-4 md:p-5" method="POST">
        <div class="grid gap-4 mb-4 grid-cols-2">
          <div class="col-span-2">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
              Pengunjung</label>
            <div class="w-full flex gap-4">
              <select id="nama" name="nama" style="width: 90%" required>
                <option value="" selected="">Pilih Pengunjung</option>
                <option value="pengunjung-620">Alice Johnson</option>
                <option value="pengunjung-619">Bob Smith</option>
                <option value="pengunjung-618">Charlie Brown</option>
                <option value="pengunjung-617">Diana Prince</option>
              </select>
              <div class="w-[10%]">
                <button type="button" id="add-user-button"
                  class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full h-full justify-center"
                  data-modal-target="add-user-modal" data-modal-toggle="add-user-modal">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="col-span-2">
            <div class="w-full flex gap-4">
              <div class="w-[90%] flex flex-col gap-4" id="ticket-container">
                <div class="flex gap-4 ticket-row">
                  <div class="flex-1">
                    <label for="tiket-1"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiket</label>
                    <select id="tiket-1" name="tiket[]"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      required>
                      <option value="" selected="">Select tiket</option>
                      <option value="tiket-1">Pejalan Kaki</option>
                      <option value="tiket-2">Sepeda</option>
                      <option value="tiket-3">Sepeda Motor</option>
                      <option value="tiket-4">Mobil</option>
                    </select>
                  </div>
                  <div class="w-fit">
                    <label for="jumlah-1"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <div class="relative flex items-center max-w-[8rem]">
                      <button type="button" id="decrement-button-1" data-input-counter-decrement="jumlah-1"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h16" />
                        </svg>
                      </button>
                      <input type="text" name="jumlah[]" id="jumlah-1" data-input-counter data-input-counter-min="1"
                        data-input-counter-max="50" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="999" value="1" required />
                      <button type="button" id="increment-button-1" data-input-counter-increment="jumlah-1"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-[10%]">
                <button type="button" id="add-ticket-button"
                  class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full h-full justify-center">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <button type="submit"
          class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
              clip-rule="evenodd"></path>
          </svg>
          Tambah
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#nama').select2({
      width: 'resolve',
      selectionCssClass: 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
      dropdownCssClass: 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
    });

    $('#add-user-button').on('click', function() {
      $('#add-user-modal').removeClass('hidden');
      $('#add-user-modal').attr({
        'aria-hidden': 'false',
        'aria-model': 'true',
        'role': 'dialog'
      });
      $('#add-transaction-modal').addClass('hidden');
      $('#add-transaction-modal').attr({
        'aria-hidden': 'true',
        'aria-model': 'false',
        'role': 'dialog'
      });
    });

    $('#add-ticket-button').on('click', function() {
      let ticketRow = $('.ticket-row').first().clone();
      let rowCount = $('.ticket-row').length + 1;

      ticketRow.find('select').val('');
      ticketRow.find('label').eq(0).attr('for', 'tiket-' + rowCount);
      ticketRow.find('select').attr('id', 'tiket-' + rowCount);
      ticketRow.find('label').eq(1).attr('for', 'jumlah-' + rowCount);
      ticketRow.find('button').eq(0).attr({
        'id': 'decrement-button-' + rowCount,
        'data-input-counter-decrement': 'jumlah-' + rowCount
      });
      ticketRow.find('button').eq(1).attr({
        'id': 'increment-button-' + rowCount,
        'data-input-counter-increment': 'jumlah-' + rowCount
      });
      ticketRow.find('input').attr('id', 'jumlah-' + rowCount).val('1');

      $('#ticket-container').append(ticketRow);

      ticketRow.find('button').eq(0).on('click', function() {
        let input = ticketRow.find('input');
        let value = parseInt(input.val());
        if (value > 1) {
          input.val(value - 1);
        }
      });

      ticketRow.find('button').eq(1).on('click', function() {
        let input = ticketRow.find('input');
        let value = parseInt(input.val());
        if (value < 50) {
          input.val(value + 1);
        }
      });

      ticketRow.find('input').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        value = Math.max(1, Math.min(50, value));
        $(this).val(value);
      });
    });
  });
</script>
