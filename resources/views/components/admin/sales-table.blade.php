@php
  $data = [
      [
          'no_transaksi' => '#192770',
          'tanggal_transaksi' => '10 Mei 2024',
          'nama_pengunjung' => 'Alice Johnson',
          'total harga' => 'Rp 15.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192769',
          'tanggal_transaksi' => '09 Mei 2024',
          'nama_pengunjung' => 'Bob Smith',
          'total harga' => 'Rp 20.000',
          'status' => 'pending',
      ],
      [
          'no_transaksi' => '#192768',
          'tanggal_transaksi' => '08 Mei 2024',
          'nama_pengunjung' => 'Charlie Brown',
          'total harga' => 'Rp 30.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192767',
          'tanggal_transaksi' => '07 Mei 2024',
          'nama_pengunjung' => 'Diana Prince',
          'total harga' => 'Rp 20.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192766',
          'tanggal_transaksi' => '06 Mei 2024',
          'nama_pengunjung' => 'Eve Adams',
          'total harga' => 'Rp 10.000',
          'status' => 'expired',
      ],
      [
          'no_transaksi' => '#192765',
          'tanggal_transaksi' => '05 Mei 2024',
          'nama_pengunjung' => 'Frank White',
          'total harga' => 'Rp 15.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192764',
          'tanggal_transaksi' => '04 Mei 2024',
          'nama_pengunjung' => 'Grace Lee',
          'total harga' => 'Rp 5.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192763',
          'tanggal_transaksi' => '03 Mei 2024',
          'nama_pengunjung' => 'Hank Green',
          'total harga' => 'Rp 12.000',
          'status' => 'success',
      ],
      [
          'no_transaksi' => '#192762',
          'tanggal_transaksi' => '02 Mei 2024',
          'nama_pengunjung' => 'Ivy Blue',
          'total harga' => 'Rp 10.000',
          'status' => 'canceled',
      ],
      [
          'no_transaksi' => '#192761',
          'tanggal_transaksi' => '01 Mei 2024',
          'nama_pengunjung' => 'Jack Black',
          'total harga' => 'Rp 5.000',
          'status' => 'success',
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
                NO. TRANSAKSI
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                TANGGAL
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                PENGUNJUNG
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                SUBTOTAL
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                STATUS
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
                  {{ $item['no_transaksi'] }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                  {{ $item['tanggal_transaksi'] }}
                </td>
                <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $item['nama_pengunjung'] }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                  {{ $item['total harga'] }}
                </td>
                <td class="p-4 whitespace-nowrap">
                  @if ($item['status'] == 'success')
                    <span
                      class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Berhasil</span>
                  @elseif($item['status'] == 'canceled')
                    <span
                      class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-red-100 dark:border-red-400 dark:bg-gray-700 dark:text-red-400">Dibatalkan</span>
                  @elseif($item['status'] == 'expired')
                    <span
                      class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-orange-100 dark:bg-gray-700 dark:border-orange-300 dark:text-orange-300">Expired</span>
                  @elseif($item['status'] == 'pending')
                    <span
                      class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">Ditunda</span>
                  @else
                    <span
                      class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">Ditunda</span>
                  @endif
                </td>
                <td class="p-4 whitespace-nowrap">
                  <button
                    class="text-xs font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-width="2"
                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                      <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                  <button
                    class="text-xs font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-500 dark:hover:text-yellow-300">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>
                  </button>
                  <button
                    class="text-xs font-medium text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300">
                    <svg class="w-6 h-6" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                      viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                  </button>
                </td>
              </tr>
            @endforeach

          </tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
