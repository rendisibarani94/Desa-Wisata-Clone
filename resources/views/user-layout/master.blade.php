<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/logo/logo.png') }}" type="image/icon type">
    <title>@yield("Judul_Halaman")</title>
</head>
<body class="bg-grey-950">
    <div class="flex flex-col h-screen justify-between">
        {{-- Logo --}}
        <div class="mx-auto">
            <a href="{{ route('beranda.index') }}">
                <img src="{{ asset('images/logo/logo.png') }}" class="w-20 h-16" alt="">
            </a>
        </div>
        {{-- Navbar Header --}}
        <nav class="bg-sky-700 border-gray-200 py-2.5 ">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    {{-- Logo --}}
                    {{-- <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo"> --}}
                    {{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Logo</span> --}}
                </a>

                {{-- Responsive Navbar --}}
                <div class="flex items-center lg:order-2">
                    <div class="hidden mt-2 mr-4 sm:inline-block">
                        <span></span>
                    </div>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="true">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                </div>

                {{-- Menu Navbar --}}
                <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ route('beranda.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('profil.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('objek-wisata.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Objek Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('kategori-wisata.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Kategori Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('atraksiWisata.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Atraksi Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('user.fasilitas.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Fasilitas</a>
                        </li>
                        <li>
                            <a href="{{ route('paket-wisata.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Paket Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('beritaWisata.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Berita Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('produk-umkm.index') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">UMKM</a>
                        </li>
                        <li>
                            <a href="" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Administrasi Desa</a>
                        </li>
                        <li>
                            <a href="/login" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-700 lg:p-0 dark:hover:bg-gray-700  lg:dark:hover:bg-transparent dark:border-gray-700">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Content --}}
        <div class="flex-grow">
            @yield('Konten')
        </div>
        <br>
        {{-- Content --}}

        {{-- Footer --}}
        <footer class="bg-sky-700 py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Logo and Description -->
                    <div class="md:col-span-1">
                        <a href="{{ route('beranda.index') }}">
                            <img src="{{ asset('images/logo/logo.png') }}" class="w-20 h-16 mb-4" alt="">
                        </a>
                        <p class="text-white text-caption">Akses ke pulau ini dapat dilakukan melalui perjalanan darat dari kota Medan, ibu kota Sumatera Utara, yang memakan waktu sekitar 4-5 jam, diikuti dengan perjalanan feri singkat dari Pelabuhan Ajibata di Parapat menuju Pulau Samosir.</p>
                    </div>
                    <!-- Contact Info -->
                    <div class="mt-8">
                        <h2 class="text-artikel font-semibold uppercase text-white mb-4 text-center">Contact Info</h2>
                        <ul class="text-white font-normal">
                            <li class="mb-4 text-center">
                                <a href="#" class="hover:underline font-poppins text-center">082275452068</a>
                            </li>
                            <li class="mb-6 text-center">
                                <a href="#" class="hover:underline font-poppins">janggadolok@gmail.com</a>
                            </li>
                            <!-- Social Media Links -->
                            <li class="mb-4">
                                <div class="flex items-center justify-center space-x-14">
                                    <!-- Instagram -->
                                    <a href="#">
                                        <span class="[&>svg]:h-7 [&>svg]:w-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- Instagram -->
                                    <a href="#">
                                        <span class="[&>svg]:h-7 [&>svg]:w-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- Facebook -->
                                    <a href="#">
                                        <span class="[&>svg]:h-7 [&>svg]:w-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                                <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Map -->
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31887.28001319668!2d98.62438718155724!3d2.5362468076396607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d0933c31e0a5%3A0xdb7c1c2489e8d729!2sSosor%20Dolok%2C%20Kec.%20Harian%2C%20Kabupaten%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1712985391756!5m2!1sid!2sid" width="500px" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <hr class="border-gray-300 mx-auto sm:my-6 lg:my-4" />
            <div class="text-center text-caption text-white">
                Copyright © 2023. All Rights Reserved.
            </div>
        </footer>
    </div>

    {{-- Navbar Script --}}
    @yield('js')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    @include('sweetalert::alert')

</body>
</html>
