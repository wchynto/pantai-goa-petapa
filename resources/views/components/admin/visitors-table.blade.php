@php
  $data = [
      [
          'pengunjung_id' => 'pengunjung-1',
          'nama' => 'John Doe',
          'no_telepon' => '081234567890',
          'tipe' => 'member',
      ],
      [
          'pengunjung_id' => 'pengunjung-2',
          'nama' => 'Ivan Eka Prasetya',
          'no_telepon' => '081234509876',
          'tipe' => 'guest',
      ],
      [
          'pengunjung_id' => 'pengunjung-3',
          'nama' => 'Dea Aulia',
          'no_telepon' => '081234765890',
          'tipe' => 'guest',
      ],
      [
          'pengunjung_id' => 'pengunjung-4',
          'nama' => 'Rizky Ramadhan',
          'no_telepon' => '081234587690',
          'tipe' => 'member',
      ],
      [
          'pengunjung_id' => 'pengunjung-5',
          'nama' => 'Rizal Fauzi',
          'no_telepon' => '081543267890',
          'tipe' => 'member',
      ],
      [
          'pengunjung_id' => 'pengunjung-6',
          'nama' => 'Luthfi Dzulfikar',
          'no_telepon' => '081234567098',
          'tipe' => 'guest',
      ],
      [
          'pengunjung_id' => 'pengunjung-7',
          'nama' => 'Yusuf Fadillah',
          'no_telepon' => '081234598760',
          'tipe' => 'guest',
      ],
      [
          'pengunjung_id' => 'pengunjung-8',
          'nama' => 'Ujang Betok',
          'no_telepon' => '081287654390',
          'tipe' => 'member',
      ],
      [
          'pengunjung_id' => 'pengunjung-9',
          'nama' => 'Hendri Saputra',
          'no_telepon' => '081654327890',
          'tipe' => 'guest',
      ],
      [
          'pengunjung_id' => 'pengunjung-10',
          'nama' => 'Fadilah Saputra',
          'no_telepon' => '081876543290',
          'tipe' => 'member',
      ],
  ];
@endphp

<div class="flex flex-col mt-6">
  <div class="overflow-x-auto rounded-lg">
    <div class="inline-block min-w-full align-middle">
      <div class="overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
          <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                NAMA
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                NO. TELEPON
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                ROLE
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                AKSI
              </th>
            </tr>
          </thead>
          <tbody class="bg-white dark:bg-gray-800">
            @foreach ($data as $item)
              <tr class="{{ $loop->even ? 'bg-gray-50 dark:bg-gray-700' : '' }}">
                <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $item['nama'] }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                  {{ $item['no_telepon'] }}
                </td>
                <td class="p-4 whitespace-nowrap">
                  @if ($item['tipe'] == 'member')
                    <span
                      class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Member</span>
                  @else
                    <span
                      class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-orange-100 dark:bg-gray-700 dark:border-orange-300 dark:text-orange-300">Guest</span>
                  @endif
                </td>
                <td class="p-4 whitespace-nowrap">
                  {{-- Edit Button --}}
                  <button type="button"
                    class="text-xs font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-500 dark:hover:text-yellow-300"
                    data-modal-target="editPengunjungModal-{{ $item['pengunjung_id'] }}"
                    data-modal-toggle="editPengunjungModal-{{ $item['pengunjung_id'] }}">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>
                  </button>
                  {{-- Edit Pengunjung Modal --}}
                  <div id="editPengunjungModal-{{ $item['pengunjung_id'] }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden top-4 fixed md:top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                          class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Pengunjung
                          </h3>
                          <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="editPengunjungModal-{{ $item['pengunjung_id'] }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                          </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST">
                          <input type="hidden" name="pengunjung_id" value="{{ $item['pengunjung_id'] }}">
                          <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                              <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                              <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan nama" required="" value="{{ $item['nama'] }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                              <label for="no_telepon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Telepon</label>
                              <input type="text" name="no_telepon" id="no_telepon"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan no. telepon" required="" value="{{ $item['no_telepon'] }}">
                            </div>
                            <div class="col-span-2">
                              <label for="tipe"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                              <select name="tipe" id="tipe"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="guest" {{ $item['tipe'] == 'guest' ? 'selected' : '' }}>Guest</option>
                                <option value="member" {{ $item['tipe'] == 'member' ? 'selected' : '' }}>Member</option>
                              </select>
                            </div>
                          </div>
                          <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>

                  {{-- Delete Button --}}
                  <button
                    class="text-xs font-medium text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300"
                    data-modal-target="deletePengunjungModal-{{ $item['pengunjung_id'] }}"
                    data-modal-toggle="deletePengunjungModal-{{ $item['pengunjung_id'] }}">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                  </button>
                  {{-- Delete Pengunjung Modal --}}
                  <div
                    class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
                    id="deletePengunjungModal-{{ $item['pengunjung_id'] }}">
                    <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                          <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                            data-modal-hide="deletePengunjungModal-{{ $item['pengunjung_id'] }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                            </svg>
                          </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST">
                          <input type="hidden" name="pengunjung_id" value="{{ $item['pengunjung_id'] }}">
                          <div class="p-6 pt-0 text-center">
                            <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor"
                              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400 whitespace-normal">
                              Apakah Anda yakin ingin menghapus pengunjung ini?
                            </h3>
                            <button type="submit"
                              class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                              Yes, I'm sure
                            </button>
                            <a href="#"
                              class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                              data-modal-hide="deletePengunjungModal-{{ $item['pengunjung_id'] }}">
                              No, cancel
                            </a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
