<div class="flex flex-col mt-4">
    <div class="min-w-full align-middle">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 display" id="tickets-table">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            NO TIKET
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            JUMLAH
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            JENIS KENDARAAN
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            TANGGAL PEMBELIAN
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            TANGGAL KADALUARSA
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            STATUS
                        </th>
                        {{-- <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            AKSI
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($items as $item)
                        <tr>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                #{{ $item->pivot->no_tiket }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $item->pivot->jumlah }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $item->kendaraan->jenis_kendaraan }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $item->pivot->created_at }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $item->pivot->expire_in }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $item->pivot->status }}
                            </td>
                            {{-- <td class="p-4  whitespace-nowrap">

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let table = $('#tickets-table').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "order": [],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "language": {
            "search": "_INPUT_",
            "searchPlaceholder": "Cari tiket...",
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data tidak tersedia",
            "infoFiltered": "(difilter dari _MAX_ total data)",
        },
    });
</script>
