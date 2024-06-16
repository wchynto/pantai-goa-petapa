<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="flex justify-center mt-16">
        <div class="container xl:max-w-screen-xl p-4">
            <div class="flex items-center justify-center">
                <a href="{{ route('user.order', auth()->user()->uuid) }}">
                    <div
                        class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-100 rounded-full">
                        <span class="text-2xl font-semibold text-white dark:text-blue-900">1</span>
                    </div>
                </a>

                <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">

                <div
                    class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-900 rounded-full">
                    <span class="text-2xl font-semibold text-white">2</span>
                </div>

                <hr class="w-12 h-1 my-4 bg-gray-700 border-0 rounded md:my-10">

                <a href="{{ route('user.payment', auth()->user()->uuid) }}">
                    <div
                        class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-blue-100 rounded-full">
                        <span class="text-2xl font-semibold text-white dark:text-blue-900">3</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center justify-center mx-auto dark:text-white">
                <h1 class="text-l px-14">Pesan</h1>
                <h1 class="text-l font-bold">Konfirmasi</h1>
                <h1 class="text-l px-8">Pembayaran</h1>
            </div>

            <div class="flex lg:flex-col flex-row pt-20 gap-4">
                {{-- KONFIRMASI PESANAN --}}
                <div class="w-full mb-8">
                    <h1 class="text-l mb-4 font-semibold lg:text-lg dark:text-white">Konfirmasi Pemesanan</h1>
                    <div
                        class="w-full bg-blue-100 border border-gray-200 shadow-xl lg:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-600 my-4 rounded-lg py-4">
                        {{-- METODE PEMBAYARAN --}}
                        <h1 class="lg:text-lg text-sm font-semibold dark:text-white ms-4 lg:ms-0">Metode Pembayaran</h1>
                        <div class="flex flex-row gap-10 my-4 mx-4 lg:mx-0">
                            <div
                                class="w-1/3 lg:w-full shadow border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 rounded-lg my-auto">
                                <img src="{{ asset('images/dana.png') }}" alt="Dana" class="lg:mx-auto py-2 w-8/9">
                            </div>
                            <div
                                class="w-1/3 lg:w-full shadow border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 rounded-lg my-auto">
                                <img src="{{ asset('images/bank.png') }}" alt="Bank"
                                    class="mx-auto py-2 w-1/3 md:w-1/3 lg:w-1/5">
                            </div>
                            <div
                                class="w-1/3 lg:w-full shadow border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 rounded-lg my-auto">
                                <img src="{{ asset('images/dana.png') }}" alt="Dana" class="lg:mx-auto py-2 w-8/9">
                            </div>
                        </div>

                        {{-- INFO AKUN --}}
                        <h1 class="lg:text-lg text-sm font-semibold dark:text-white m-4 lg:mx-0">Informasi Akun</h1>
                        <div class="flex flex-row gap-10 m-4 lg:mx-0">
                            <div class="w-2/3 rounded-lg">
                                <input type="text" name="card_number" id="card_number"
                                    class="w-full bg-white shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lg:py-4 lg:text-base"
                                    placeholder="Enter your virtual account number" required="">
                            </div>
                            <div class="w-1/3 rounded-lg">
                                <input type="text" name="usn_dana" id="usn_dana"
                                    class="bg-white shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lg:py-4 lg:text-base"
                                    placeholder="Username Dana" required="">
                            </div>
                        </div>

                        {{-- LOKASI MAP --}}
                        <h1 class="lg:text-lg text-sm mb-4 font-semibold mx-4 lg:mx-0 dark:text-white">Lokasi Wisata
                        </h1>
                        <div class="flex flex-col sm:flex-row gap-10 my-4 mx-4 lg:mx-0">
                            {{-- MAPS --}}
                            <div class="w-full lg:w-full aspect-w-16 aspect-h-9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15834.903932784351!2d112.79205323181527!3d-7.157645635548374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd802ced08960c5%3A0x7b2406a342114256!2sPantai%20Goa%20Petapa!5e0!3m2!1sid!2sid!4v1717248902252!5m2!1sid!2sid"
                                    class="rounded-lg w-full h-full border-0" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>

                            <div class="flex-row w-full">
                                {{-- Name --}}
                                <div class="w-full rounded-lg pb-2">
                                    <input type="text" name="nama_pemesan" id="nama_pemesan"
                                        class="bg-white shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lg:text-base"
                                        placeholder="Masukkan Nama" required="">
                                </div>

                                {{-- Email --}}
                                <div class="w-full rounded-lg py-4">
                                    <input type="email" name="email_pemesan" id="email_pemesan"
                                        class="bg-white shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lg:text-base"
                                        placeholder="Masukkan Email" required="">
                                </div>

                                {{-- Phone --}}
                                <div class="w-full rounded-lg pt-2">
                                    <input type="tel" name="telepon_pemesan" id="telepon_pemesan"
                                        class="bg-white shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lg:text-base"
                                        placeholder="Masukkan Telepon" required="">
                                </div>
                            </div>
                        </div>

                        {{-- GO BACK --}}
                        <div class="mt-10 flex flex-row mx-4 lg:mx-0">
                            <div class="w-1/2 flex items-center">
                                <a href="{{ route('user.order', auth()->user()->uuid) }}" class="flex items-center">
                                    <svg class="w-5 h-5 lg:w-5 lg:h-5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round"
                                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                                    </svg>
                                    <h1
                                        class="text-base font-semibold leading-tight tracking-tight text-gray-900 md:text-lg dark:text-white ml-2">
                                        Kembali</h1>
                                </a>
                            </div>
                            <div class="w-1/2 flex justify-end items-end">
                                <a href="{{ route('user.payment', auth()->user()->uuid) }}"><button type="submit"
                                        class="w-full text-white hover bg-blue-900 shadow border-blue-900 hover:bg-blue-600 block focus:outline-none font-bold rounded-lg text-sm p-2.5 text-center  dark:text-white dark:hover:text-white hover:text-white lg:text-base">Selanjutnya</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
