<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex justify-center mt-16">
    <div class="container xl:max-w-screen-xl p-4">
      <div class="flex items-center justify-center">
        <a href="order"><div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-200 rounded-full">
          <span class="text-2xl font-semibold text-white">1</span>
        </div></a>
        
        <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">
        
        <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-900 rounded-full">
          <span class="text-2xl font-semibold text-white">2</span>
        </div>
        
        <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">
        
        <a href="payment"><div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-200 rounded-full">
          <span class="text-2xl font-semibold text-white">3</span>
        </div></a>
      </div>

      <div class="flex items-center justify-center mx-auto">
        <h1 class="text-l px-14">Pesan</h1>
        <h1 class="text-l font-semibold">Konfirmasi</h1>
        <h1 class="text-l px-8">Pembayaran</h1>
      </div>

      <div class="flex flex-col sm:flex-row pt-20 gap-10">
        {{-- KONFIRMASI PESANAN--}}
        <div class="w-full mb-8">
          <h1 class="text-l mb-4 font-semibold">Konfirmasi Pemesanan</h1>
          <div class="w-full bg-blue-200 border border-gray-200 shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 mb-4 rounded-lg">
            {{-- METODE PEMBAYARAN --}}
            <h1 class="text-l mb-4 font-semibold dark:text-white">Metode Pembayaran</h1>
            <div class="flex flex-col sm:flex-row gap-10">
              <div class="w-1/3 bg-white dark:bg-white rounded-lg l:py-1 ">
                <img src="{{ asset('images/dana.png') }}" alt="Hero Pantai Goa Petapa" class="mx-auto py-2">
              </div>
              <div class="w-1/3 bg-white dark:bg-white rounded-lg l:py-1">
                <img src="{{ asset('images/bank.png') }}" alt="Hero Pantai Goa Petapa" class="mx-auto py-2">
              </div>
              <div class="w-1/3 bg-white dark:bg-white rounded-lg l:py-1">
                <img src="{{ asset('images/dana.png') }}" alt="Hero Pantai Goa Petapa" class="mx-auto py-2">
              </div>
            </div>

            {{-- INFO AKUN --}}
            <h1 class="text-l mb-4 font-semibold dark:text-white">Informasi Akun</h1>
            <div class="w-2/4"></div>
            <div class="w-1/4"></div>
            <div class="w-1/4"></div>

            {{-- INFO PENGIRIMAN --}}
            <h1 class="text-l mb-4 font-semibold dark:text-white">Informasi Pengiriman</h1>
            <div class="w-2/5"></div>
            <div class="w-3/5"></div>


            {{-- GO BACK --}}
            <div class="mt-10 flex flex-col sm:flex-row">
              <div class="w-1/6">
                <a href="order"><svg class="w-7 h-7 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" d="M13 5H1m0 0 4 4M1 5l4-4"/></svg>
              </div>
              <div class="">
                <h1 class="text-lg font-semibold leading-tight tracking-tight text-gray-900 md:text-lg dark:text-white"> Kembali</h1></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</x-layout>
