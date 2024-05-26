<x-admin.layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="px-4 pt-6">
    <div class="grid gap-4">
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <x-admin.posts-header></x-admin.posts-header>

        <!-- Table -->
        <x-admin.posts-table></x-admin.posts-table>

        <!-- Card Footer -->
        <x-admin.posts-footer></x-admin.posts-footer>
      </div>
    </div>
  </div>
</x-admin.layout>
