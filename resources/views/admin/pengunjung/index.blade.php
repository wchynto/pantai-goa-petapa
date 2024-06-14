<x-admin.layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="px-4 pt-6">
    <div class="grid gap-4">
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <x-admin.card-header title="Daftar Pengunjung" breadcrumb="Pengunjung"
          breadcrumbUrl="{{ route('pengunjung.index') }}" searchPlaceholder="Cari pengunjung..."
          buttonUrl="{{ route('pengunjung.create') }}" buttonText="Tambah Pengunjung Baru"></x-admin.card-header>

        @if (session()->has('success'))
          <x-alert.success>{{ session('success') }}</x-alert.success>
        @endif

        <!-- Table -->
        <x-admin.visitors-table :items="$pengunjung"></x-admin.visitors-table>

        <!-- Card Footer -->
        <x-admin.card-footer :start="1" :end="10" :total="2340"></x-admin.card-footer>
      </div>
    </div>
  </div>
</x-admin.layout>
