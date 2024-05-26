<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex justify-center mt-16">
    <div class="container xl:max-w-screen-xl p-4">
      <div class="flex items-center justify-center">
        <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-900 rounded-full">
          <span class="text-2xl font-semibold text-white">1</span>
        </div>

        <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">
        
        <a href="confirmation-order"><div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-200 rounded-full">
          <span class="text-2xl font-semibold text-white">2</span>
        </div></a>

        <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">

        <a href="payment"><div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-200 rounded-full">
          <span class="text-2xl font-semibold text-white">3</span>
        </div></a>
      </div>
      <div class="flex items-center justify-center mx-auto">
        <h1 class="text-l px-12">Order</h1>
        <h1 class="text-l">Confirmation</h1>
        <h1 class="text-l px-9">Payment</h1>
      </div>

      <div class="flex flex-col sm:flex-row pt-20 gap-10">
        {{-- SHOPPING CART --}}
        <div class="w-3/4">
          <h1 class="text-l mb-4">Shopping Cart</h1>
          <div class="w-full bg-white border border-gray-200 shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 mb-4 rounded-lg">
            <div class="relative overflow-x-auto shadow-xl sm:rounded-lg mb-4">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-blue-900 dark:text-gray-300">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      Product
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">
                      Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Subtotal
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                      <img src="{{ asset('images/mobil.png') }}" alt="Tiket-mobil">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Tiket Masuk Mobil
                    </th>
                    <td class="px-6 py-4">
                        1
                    </td>
                    <td class="px-6 py-4">
                        Rp10.000
                    </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                      <img src="{{ asset('images/sepeda-motor.png') }}" alt="Tiket-sepeda-motor">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Tiket Masuk Sepeda Motor
                    </th>
                    <td class="px-6 py-4">
                      1
                    </td>
                    <td class="px-6 py-4">
                      Rp5.000
                    </td>
                  </tr>
                  <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                      <img src="{{ asset('images/pejalan-kaki.png') }}" alt="Tiket-pejalan-kaki">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Tiket Masuk Pejalan Kaki
                    </th>
                    <td class="px-6 py-4">
                      1
                    </td>
                    <td class="px-6 py-4">
                      Rp1.000
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-10 flex flex-col sm:flex-row">
              <div class="w-1/6">
                <a href="tiket"><svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" d="M13 5H1m0 0 4 4M1 5l4-4"/></svg>
              </div>
              <div class="">
                <h1 class="text-lg leading-tight tracking-tight text-blue-900 md:text-lg dark:text-white"> Go Back</h1></a>
              </div>
            </div>
          </div>
        </div>

        {{-- ORDER SUM --}}
        <div class="w-1/4">
          <h1 class="text-l mb-4">Order Summary</h1>

        </div>
      </div>
    </div>
  </section>
</x-layout>
