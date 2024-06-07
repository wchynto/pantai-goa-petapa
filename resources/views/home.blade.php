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

  <main class="flex flex-col items-center pt-16 mb-12" id="explore">
  </main>
</x-layout>
