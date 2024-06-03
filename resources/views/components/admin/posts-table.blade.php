@php
  $kategori = [
      [
          'nama' => 'Pantai',
      ],
      [
          'nama' => 'Gunung',
      ],
      [
          'nama' => 'Hutan',
      ],
      [
          'nama' => 'Sawah',
      ],
  ];

  $data = [
      [
          'postingan_id' => 'postingan-1',
          'thumbnail' => 'nature',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',
          'kategori' => $kategori[0]['nama'],
      ],
      [
          'postingan_id' => 'postingan-2',
          'thumbnail' => 'technology',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',
          'kategori' => $kategori[1]['nama'],
      ],
      [
          'postingan_id' => 'postingan-3',
          'thumbnail' => 'food',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[2]['nama'],
      ],
      [
          'postingan_id' => 'postingan-4',
          'thumbnail' => 'fashion',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[3]['nama'],
      ],
      [
          'postingan_id' => 'postingan-5',
          'thumbnail' => 'nature',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[0]['nama'],
      ],
      [
          'postingan_id' => 'postingan-6',
          'thumbnail' => 'technology',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[1]['nama'],
      ],
      [
          'postingan_id' => 'postingan-7',
          'thumbnail' => 'food',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[2]['nama'],
      ],
      [
          'postingan_id' => 'postingan-8',
          'thumbnail' => 'fashion',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[3]['nama'],
      ],
      [
          'postingan_id' => 'postingan-9',
          'thumbnail' => 'nature',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[0]['nama'],
      ],
      [
          'postingan_id' => 'postingan-10',
          'thumbnail' => 'technology',
          'judul' => 'Lorem ipsum dolor sit amet',
          'body' =>
              '<h1>Lorem ipsum dolor sit amet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ut libero ultrices ultricies. Nullam nec purus ut libero ultrices ultricies.</p>',

          'kategori' => $kategori[1]['nama'],
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
                THUMBNAIL
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                JUDUL
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                BODY
              </th>
              <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                KATEGORI
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
                  <img src="https://source.unsplash.com/100x100/?{{ $item['thumbnail'] }}"
                    alt="{{ $item['thumbnail'] }}" class="w-10 h-10 object-cover rounded-lg">
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                  {{ $item['judul'] }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                  {{ Str::limit(strip_tags($item['body']), 100, '...') }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                  {{ $item['kategori'] }}
                </td>
                <td class="p-4 whitespace-nowrap">
                  {{-- Edit Button --}}
                  <a href="{{ url('admin/postingan/' . $item['postingan_id'] . '/edit') }}"
                    class="inline-block text-xs font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-500 dark:hover:text-yellow-300">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>
                  </a>

                  {{-- Delete Button --}}
                  <button
                    class="text-xs font-medium text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300"
                    data-modal-target="deletePengunjungModal-{{ $item['postingan_id'] }}"
                    data-modal-toggle="deletePengunjungModal-{{ $item['postingan_id'] }}">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                  </button>
                  {{-- Delete Pengunjung Modal --}}
                  <div
                    class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
                    id="deletePengunjungModal-{{ $item['postingan_id'] }}">
                    <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                          <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                            data-modal-hide="deletePengunjungModal-{{ $item['postingan_id'] }}">
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
                          <input type="hidden" name="postingan_id" value="{{ $item['postingan_id'] }}">
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
                              data-modal-hide="deletePengunjungModal-{{ $item['postingan_id'] }}">
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
