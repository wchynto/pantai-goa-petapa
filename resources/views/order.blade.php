<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex justify-center mt-16">
    <div class="container xl:max-w-screen-xl p-4">
      <div class="flex items-center justify-center">
        <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-blue-900">
          <span class="text-2xl font-semibold text-white dark:text-gray-300">1</span>
        </div>
        <hr class="w-12 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-blue-200">
          <span class="text-2xl font-semibold text-white">2</span>
        </div>
        <hr class="w-12 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-blue-200">
          <span class="text-2xl font-semibold text-white">3</span>
        </div>
      </div>
      <div class="flex items-center justify-center">
        <h1 class="text-l m-4">Order</h1>
        <h1 class="text-l m-4">Confirmation</h1>
        <h1 class="text-l m-4">Payment</h1>
      </div>
    </div>
  </section>
</x-layout>
