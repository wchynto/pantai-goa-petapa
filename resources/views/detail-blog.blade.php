<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex flex-col justify-center mt-4">
    <div class="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250"><path fill-opacity="1" d="M0,160L60,160C120,160,240,160,360,170.7C480,181,600,203,720,192C840,181,960,139,1080,133.3C1200,128,1320,160,1380,176L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z" class="fill-blue-100 dark:fill-gray-900"></path></svg>
    </div>
    <div class="container xl:max-w-screen-xl px-4 mx-auto">
      <div class="flex lg:flex-col flex-row gap-4">
        <div class="w-full mb-8">
          <h1 class="mb-4 font-semibold lg:text-lg">Judul</h1>
        </div>
      </div>
    </div>
  </section>
</x-layout>
