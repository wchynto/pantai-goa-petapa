<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply bg-cover mt-16 flex justify-center"
    style="background-image: url('{{ asset('images/background-jumbotron.png') }}')">
    <div class="container xl:max-w-screen-xl">
      <div class="px-4 mx-auto py-24 lg:py-56 flex">
        <div class="w-3/4">
          <p class="mb-8 text-lg font-bold text-gray-300 lg:text-3xl">Pantai Goa Petapa</p>
          <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
            Enjoy the beauty of nature and soothing sound of the waves
            that calm your soul</h1>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ url('tiket') }}"
              class="inline-flex justify-center items-center py-3 px-7 text-base font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:ring-slate-100 dark:focus:ring-slate-700">
              Lihat Tiket
            </a>
            <a href="{{ url('login') }}"
              class="inline-flex justify-center items-center py-3 px-7 text-base font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:ring-slate-100 dark:focus:ring-slate-700">
              Login
            </a>
          </div>
        </div>
        <div class="w-1/4">
          <img class="w-full" src="{{ asset('images/logo.png') }}" alt="Hero Pantai Goa Petapa">
        </div>
      </div>
    </div>
  </section>

  <div class="flex lg:mx-32 flex-row gap-4 md:mx-5 mx-5">
    <div class="mb-8 mt-0 lg:mb-20 md:mb-10 md:mt-5 w-full bg-white border-gray-200 shadow-2xl lg:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 lg:mt-8 rounded-lg py-4 flex flex-col">
      <div class="flex flex-col">
        <p class="text-lg font-bold text-blue-950 lg:text-2xl text-center mb-5 dark:text-white">Fasilitas</p>
      </div>

      <div class="flex flex-col lg:flex-row md:mx-6 mb-4 md:mb-1 lg:px-6">
        <div class="md:flex md:flex-row mb-9">
          <div class="mb-9 md:mb-0">
            <img src="{{ asset('images/park.png') }}" alt="Park" class="w-3/5 mx-auto lg:w-5/6">
            <p class="text-lg font-bold text-blue-900 lg:text-2xl text-center lg:mt-4 lg:mb-1 dark:text-white">Tempat Parkir</p>
            <p class="mx-auto text-base font-light text-gray-800 text-center md:text-sm dark:text-white lg:w-4/5 lg:text-base w-3/5 md:w-3/5">Tempat parkir selalu tersedia tanpa perlu khawatir kehabisan.</p>
          </div>
          <div class="">
            <img src="{{ asset('images/toilet.png') }}" alt="Toilet" class="w-3/5 mx-auto lg:w-5/6">
            <p class="text-lg font-bold text-blue-900 lg:text-2xl text-center lg:mt-4 lg:mb-1 dark:text-white">Toilet</p>
            <p class="mx-auto text-base font-light text-gray-800 text-center dark:text-white lg:w-5/6 md:text-sm lg:text-base w-3/5 md:w-3/5">Toilet dilengkapi dengan fasilitas yang bersih dan nyaman.</p>
          </div>
        </div>

        <div class="md:flex md:flex-row">
          <div class="md:w-full mb-9 md:mb-0">
            <img src="{{ asset('images/playground.png') }}" alt="Playground" class="w-3/5 mx-auto lg:w-4/5">
            <p class="text-lg font-bold text-blue-900 lg:text-2xl text-center lg:mt-4 lg:mb-1 dark:text-white">Playground</p>
            <p class="mx-auto text-base font-light text-gray-800 text-center md:text-sm dark:text-white lg:w-4/5 lg:text-base w-3/5 md:w-3/5">Anak-anak bisa bermain dengan leluasa tanpa ingin pulang lebih awal</p>
          </div>
          <div class="md:w-full">
            <img src="{{ asset('images/boat.png') }}" alt="boat" class="w-3/5 mx-auto lg:w-4/5">
            <p class="font-bold text-blue-900 lg:text-2xl text-center lg:mt-4 lg:mb-1 dark:text-white text-base">Boat</p>
            <p class="mx-auto text-base font-light text-gray-800 text-center dark:text-white lg:w-4/5 md:text-sm lg:text-base w-3/5 md:w-3/5">Perahu tersedia untuk petualangan laut yang menyenangkan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
