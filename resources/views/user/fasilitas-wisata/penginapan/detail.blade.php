@extends('user-layout.master')
@section('Judul_Halaman','Detail Penginapan')
@section('Konten')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="grid grid-cols-2 gap-4">
        <!-- Left Column -->
        <div class="col-span-1">
            <!-- Single Photo -->
            <img src="{{ asset('images/fasilitas/penginapan/'.$data->gambar1) }}" alt="Left Photo" class="w-full h-auto rounded-md ">
        </div>

        <!-- Right Column -->
        <div class="col-span-1 grid grid-cols-2 gap-4">
            <!-- First Row -->
            <div>
                <img src="{{ asset('images/fasilitas/penginapan/'.$data->gambar2) }}" alt="Right Photo 1" class="w-full h-auto rounded-md  " style="max-width: 100%; height: auto;">
            </div>
            <div>
                <img src="{{ asset('images/fasilitas/penginapan/'.$data->gambar3) }}" alt="Right Photo 2" class="w-full h-auto rounded-md  " style="max-width: 100%; height: auto;">
            </div>

            <!-- Second Row -->
            <div>
                <img src="{{ asset('images/fasilitas/penginapan/'.$data->gambar4) }}" alt="Right Photo 3" class="w-full h-auto rounded-md  " style="max-width: 100%; height: auto;">
            </div>
            <div>
                <img src="{{ asset('images/fasilitas/penginapan/'.$data->gambar5) }}" alt="Right Photo 4" class="w-full h-auto rounded-md  " style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="">
            <p class="text-4xl font-semibold text-indigo-950 font-roboto mb-6 ">
                {{ $data->namaPenginapan }}
            </p>
        </div>
        <div class="">
            <div class="text-center">
                <p class="mb-1 font-poppins text-lg font-semibold">Mulai Dari</p>

                <p class="mb-1 font-poppins text-lg text-red-600 font-semibold">{{ 'Rp ' . number_format($data->harga, 0, ',', '.'); }}</p>
                <p class="mb-1 font-poppins text-lg font-semibold">kamar/malam</p>
            </div>
        </div>

    </div>


    {{-- Void --}}

    <p class="text-xl font-bold text-indigo-950 font-roboto mb-6 mt-5">
        Deskripsi
    </p>
    <div class=" ml-4 text-justify font-poppins">
        {{-- Deskripsi Here --}}
        {!! $data->deskripsi !!}
    </div>
    <hr class="bold-hr border-gray-800 mx-auto sm:my-6 lg:my-4" />

    <p class="text-xl font-bold text-indigo-950 font-roboto mb-6 mt-5">
        Fasilitas
    </p>
    <div class=" ml-4">
        <div class="">
            {{-- 1 --}}
            <div class="">
                <div class="flex justify-between">
                    <div class="flex mb-4">
                        {{-- wifi --}}
                        <div class="">
                            <svg class="h-8 w-8 text-slate-900" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <g transform="rotate(-45 12 18)">
                                    <line x1="12" y1="18" x2="12.01" y2="18" />
                                    <path d="M12 14a4 4 0 0 1 4 4" />
                                    <path d="M12 10a8 8 0 0 1 8 8" />
                                    <path d="M12 6a12 12 0 0 1 12 12" />
                                </g>
                            </svg>

                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->wifi }}
                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        {{-- AC --}}
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M6.59.66c2.34-1.81 4.88.4 5.45 3.84c.43 0 .85.12 1.23.34c.52-.6.98-1.42.8-2.34c-.42-2.15 1.99-3.89 4.28-.92c1.81 2.34-.4 4.88-3.85 5.45c0 .43-.11.86-.34 1.24c.6.51 1.42.97 2.34.79c2.13-.42 3.88 1.98.91 4.28c-2.34 1.81-4.88-.4-5.45-3.84c-.43 0-.85-.13-1.22-.35c-.52.6-.99 1.43-.81 2.35c.42 2.14-1.99 3.89-4.28.92c-1.82-2.35.4-4.89 3.85-5.45c0-.43.13-.85.35-1.23c-.6-.51-1.42-.98-2.35-.8c-2.13.42-3.88-1.98-.91-4.28M5 16h2a2 2 0 0 1 2 2v6H7v-2H5v2H3v-6a2 2 0 0 1 2-2m0 2v2h2v-2zm7.93-2H15l-2.93 8H10zM18 16h3v2h-3v4h3v2h-3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2" /></svg>
                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->ac }}

                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        {{-- Customer Service --}}
                        <div class="">
                            <svg class="h-8 w-8 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->contactPerson }}

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2 --}}
            <div class="">
                <div class="flex justify-between">
                    <div class="flex mb-4">
                        {{-- toilet --}}
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M368 48c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16H16C7.2 0 0 7.2 0 16v16c0 8.8 7.2 16 16 16h16v156.7C11.8 214.8 0 226.9 0 240c0 67.2 34.6 126.2 86.8 160.5l-21.4 70.2C59.1 491.2 74.5 512 96 512h192c21.5 0 36.9-20.8 30.6-41.3l-21.4-70.2C349.4 366.2 384 307.2 384 240c0-13.1-11.8-25.2-32-35.3V48zM80 72c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H88c-4.4 0-8-3.6-8-8zm112 200c-77.1 0-139.6-14.3-139.6-32s62.5-32 139.6-32s139.6 14.3 139.6 32s-62.5 32-139.6 32" /></svg>

                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->toilet }}

                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        {{-- Breakfast --}}
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 2048 2048">
                                <path fill="currentColor" d="M1408 592q-26 0-45-19t-19-45q0-51 19-98t56-83l79-80q38-38 38-91q0-26 19-45t45-19t45 19t19 45q0 51-19 98t-56 83l-79 80q-38 38-38 91q0 26-19 45t-45 19m-384 0q-26 0-45-19t-19-45q0-51 19-98t56-83l79-80q38-38 38-91q0-26 19-45t45-19t45 19t19 45q0 51-19 98t-56 83l-79 80q-38 38-38 91q0 26-19 45t-45 19m832 176q40 0 75 15t61 41t41 61t15 75v384q0 40-15 75t-41 61t-61 41t-75 15h-57q-2 7-3 13t-4 12v39q0 66-25 124t-69 102t-102 69t-124 25h-384q-78 0-144-35t-110-93H334q-66 0-124-25t-102-68t-69-102t-25-125v-64h256q0-79 30-149t83-122t122-83t149-30q30 0 58 5t56 14V640h1024v128zM654 1152q-53 0-99 20t-82 55t-55 81t-20 100h370v-228q-26-13-54-20t-60-8m-320 512h441q-7-29-7-64v-64H153q10 28 28 51t41 41t52 26t60 10m463 67v1l1 2v-1zm867-131V768H896v832q0 40 15 75t41 61t61 41t75 15h384q40 0 75-15t61-41t41-61t15-75m256-256V960q0-26-19-45t-45-19h-64v512h64q26 0 45-19t19-45" /></svg>
                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->breakfast }}

                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        {{-- Cleaning Service --}}
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 23v-7q0-2.075 1.463-3.537T8 11h1V3q0-.825.588-1.412T11 1h2q.825 0 1.413.588T15 3v8h1q2.075 0 3.538 1.463T21 16v7zm2-2h2v-3q0-.425.288-.712T8 17t.713.288T9 18v3h2v-3q0-.425.288-.712T12 17t.713.288T13 18v3h2v-3q0-.425.288-.712T16 17t.713.288T17 18v3h2v-5q0-1.25-.875-2.125T16 13H8q-1.25 0-2.125.875T5 16z" /></svg>

                        </div>
                        <div class=" ml-6">
                            <p class="font-poppins">
                                {{ $data->cleaningService }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="bold-hr border-gray-800 mx-auto sm:my-6 lg:my-4" />

    <p class="text-xl font-bold text-indigo-950 font-roboto mb-6 mt-5">
        Lokasi
    </p>
    <div class=" ml-4 text-justify font-poppins">
        {{-- Lokasi Here --}}
        {!! $data->lokasi !!}
    </div>
    <hr class="bold-hr border-gray-800 mx-auto sm:my-6 lg:my-4" />

    <p class="text-xl font-bold text-indigo-950 font-roboto mb-6 mt-5">
        Informasi Lebih Lanjut
    </p>
    <div class="ml-4">

        <p class=" font-poppins mb-4">Jika anda pertanyaan seputar Homestay Silahkan hubungi kontak dibawah ini :</p>
        <div class="flex mb-4">
            <div class="">
                <svg class="h-8 w-8 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>

            </div>
            <div class=" ml-6">
                <p class="font-poppins">
                    {{ $data->kontak }}
                </p>
            </div>
        </div>

        {{-- Whatsapp Pesan Sekarang --}}
        <a href="https://wa.me/+62{{ $data->kontak }}">
            <div class=" text-justify bg-green-500 hover:bg-blue-700 text-white text-lg font-semibold w-fit py-4 px-6 rounded-full">
                {{-- Informasi Lebih Lanjut --}}
                <div class="flex">
                    <div class="mr-2">

                        <span class="[&>svg]:h-7 [&>svg]:w-7">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="text-xl">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                            </svg>
                        </span>

                    </div>
                    <div class="">
                        <div class="">
                            Pesan Sekarang
                        </div>
                    </div>
                </div>
            </div>
        </a>


    </div>
    @endsection
