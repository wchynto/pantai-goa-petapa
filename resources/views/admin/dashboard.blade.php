<x-admin.layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="px-4 pt-6">
    <div class="grid gap-4">
      <x-admin.visitor-statistics></x-admin.visitor-statistics>

      <x-admin.statistical-numbers></x-admin.statistical-numbers>
    </div>
  </div>
</x-admin.layout>
