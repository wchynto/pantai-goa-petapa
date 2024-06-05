<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-4 pt-6">
        <div class="grid gap-4">
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <!-- Card header -->
                <x-admin.card-header title="Daftar Kategori" breadcrumb="Kategori"
                    breadcrumbUrl="{{ route('kategori.index') }}" searchPlaceholder="Cari kategori..."
                    buttonUrl="{{ route('kategori.create') }}" buttonText="Tambah Kategori Baru"></x-admin.card-header>

                <!-- Table -->
                <x-admin.categories-table :items="$kategori"></x-admin.categories-table>

                <!-- Card Footer -->
                <x-admin.card-footer :start="1" :end="4" :total="4"></x-admin.card-footer>
            </div>
        </div>
    </div>
</x-admin.layout>
