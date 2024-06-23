<x-admin.layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="px-4 pt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <!-- Card header -->
      <x-admin.card-header-ticket-transaction title="Daftar Tiket" breadcrumb="Tiket"
        breadcrumbUrl="{{ route('tiket.index') }}" buttonUrl="{{ route('tiket.create') }}"
        buttonText="Tambah Tiket Baru"></x-admin.card-header-ticket-transaction>

      @if (session()->has('success'))
        <x-alert.success>{{ session('success') }}</x-alert.success>
      @elseif (session()->has('error'))
        <x-alert.error>{{ session('error') }}</x-alert.error>
      @endif

      <!-- Table -->
      <x-admin.transaksi-tiket-table :items="$transaksi_tiket"></x-admin.transaksi-tiket-table>
    </div>
  </div>

  @push('js')
    <script>
      function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        $.ajax({
          url: "{{ route('transaksi-tiket.scan') }}",
          type: "post",
          data: {
            _token: "{{ csrf_token() }}",
            no_tiket: decodedText
          },
          success: function(response) {
            setTimeout(() => {
              alert(response.message)
            }, 3000);
          },
          error: function(xhr) {
            setTimeout(() => {
              alert(xhr.responseJSON.message)
            }, 3000);
          }
        })
      }

      function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning
        // console.warn(`QR error = ${error}`);
      }

      let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
          fps: 10,
          qrbox: {
            width: 250,
            height: 250
          }
        },
        /* verbose= */
        false);
      html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
  @endpush
</x-admin.layout>
