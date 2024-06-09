<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex flex-col justify-center mt-4">
    <div class="">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path fill-opacity="1"
          d="M0,160L60,160C120,160,240,160,360,170.7C480,181,600,203,720,192C840,181,960,139,1080,133.3C1200,128,1320,160,1380,176L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"
          class="fill-blue-100 dark:fill-gray-900"></path>
      </svg>
    </div>
    <div class="container xl:max-w-screen-xl px-4 py-12 mx-auto">
      <div class="flex flex-col gap-4">
        <div class="w-full mb-8">
          <h1 class="mb-4 font-semibold lg:text-lg">Blogs</h1>
        </div>

        <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-8 lg:gap-16">
          <section class="flex flex-col sm:flex-row sm:flex-wrap justify-center items-center md:w-2/3">
            <div class="grid sm:grid-cols-2 gap-4 lg:gap-x-8">
              <x-blog-card></x-blog-card>
            </div>
            <div class="flex justify-center items-center mt-8">
              <x-pagination></x-pagination>
            </div>
          </section>
          <section class="my-10 md:my-0 md:w-1/3">
            <div class="mb-6 md:mb-8">
              <span class="text-2xl font-extrabold block md:text-3xl text-center md:text-left">Recent
                Post</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
              @for ($i = 0; $i < 5; $i++)
                <div class="mb-2 {{ $i == 0 ? 'col-span-2' : '' }}">
                  <div class="mb-2 rounded-lg bg-white shadow-lg hover:bg-primary-100">
                    <img src="{{ asset('images/background-jumbotron.png') }}"
                      class="w-full h-44 md:h-24 rounded-lg object-cover shadow-lg" alt="Photo">
                  </div>
                  <span class=text-sm font-bold"><a
                      href="{{ url('/blog/' . 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-asperiores-enim') }}"
                      class="hover:underline">Lorem
                      ipsum dolor sit amet consectetur adipisicing elit. Asperiores, enim.</a></span>
                </div>
              @endfor
            </div>
            <div class="sm:flex sm:gap-4 md:block">
              <div class="mb-6 md:mb-8 w-full sm:w-1/2 md:w-full">
                <span
                  class="text-2xl font-extrabold block md:text-3xl text-center md:text-left mt-8 mb-4">Kategori</span>
                @for ($i = 0; $i < 4; $i++)
                  <div class="flex gap-4 mb-2">
                    <img src="{{ asset('images/circle.svg') }}" alt="Icon" class="w-4 h-4">
                    <div class="flex flex-col">
                      <span class="text-sm font-bold"><a href="#" class="hover:underline">Lorem.</a></span>
                    </div>
                  </div>
                @endfor
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</x-layout>
