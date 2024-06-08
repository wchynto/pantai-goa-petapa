<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply bg-cover lg:mt-32 lg:mx-32 rounded-2xl"
    style="background-image: url('{{ asset('images/background-jumbotron.png') }}')">
    <div class="container xl:max-w-screen-xl mx-auto">
      <div class="py-24 lg:py-20 flex flex-col">
        <div class="w-full flex justify-center">
          <img width="100" src="{{ asset('images/logo.png') }}" alt="Hero Pantai Goa Petapa">
        </div>
        <div class="w-full flex justify-center">
          <p class="text-lg font-bold text-white lg:text-3xl">Pantai Goa Petapa</p>
        </div>
      </div>
    </div>
  </section>

  <p class="text-lg font-bold text-gray-800 lg:text-3xl text-center lg:my-4">Tentang Pantai Goa Petapa</p>

  <div class="flex lg:mx-32 flex-row gap-4">
    <div class="mb-8 w-full bg-blue-100 border border-gray-200 shadow-xl lg:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 my-4 rounded-lg py-4 flex flex-row">
      <img src="{{ asset('images/pantai.png') }}" alt="Hero Pantai Goa Petapa" class="w-2/5 py-4 mx-auto">
      <p class="w-1/3 mx-auto my-auto text-medium font-light text-gray-800 text-justify"><span class="font-extrabold">Pantai Goa Petapa</span> adalah destinasi wisata yang menawarkan keindahan alam pantai dan berbagai fasilitas menarik bagi pengunjung. Terletak di daerah yang strategis, pantai ini dikenal dengan pemandangan laut yang memukau, pasir putih yang lembut, dan suasana yang tenang, menjadikannya tempat ideal untuk berlibur dan bersantai.</p>
    </div>
  </div>

  <div class="w-full bg-white border border-gray-200 shadow-xl p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 mb-4 rounded-lg lg:mx-32 ">
    
  </div>

</x-layout>
