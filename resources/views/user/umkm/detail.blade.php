@extends('user-layout.master')
@section('Judul_Halaman','Detail Produk UMKM')
@section('Konten')
<div class="mx-16 my-4">
    <div class="mb-8">
        <p class="text-4xl font-bold text-indigo-950 font-roboto mt-8 mb-1">
            Detail Produk UMKM
        </p>
        <ol class="flex items-center whitespace-nowrap mt-4">
            <li class="inline-flex items-center">
                <a class="flex items-center font-roboto text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="{{ route('produk-umkm.index') }}">
                    UMKM
                </a>
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;"></path>
                </svg>
            </li>
            <li class="inline-flex items-center font-roboto text-gray-800">
                Detail
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;"></path>
                </svg>
            </li>
            <li class="inline-flex items-center font-roboto font-semibold text-gray-800 truncate " aria-current="page">
                {{ $data->namaProduk }}
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div class="mx-10">
            <img class="h-auto max-w-full w-auto rounded-lg" style="height: 400px;" src="{{asset('images/produk-umkm/'.$data->gambar)}}" alt="">
        </div>
        <div class="text-left">
            <div class="flex justify-between">
                <p class="font-poppins text-xl font-semibold">{{ $data->namaProduk }}</p>
                <p class="font-poppins font-semibold text-red-600">{{ 'Rp ' . number_format($data->harga, 0, ',', '.');  }} / {{ $data->namaQuantity }}</p>
            </div>
            <p class="tracking-tighter text-black-700 dark:text-black-400 text-left font-poppins mb-3">
                {!! $data->deskripsi !!}
            </p>

            <div class="mt-5">
                {{-- Whatsapp Pesan Sekarang --}}
                <a href="https://wa.me/+62{{ $data->kontak }}" target="_blank">
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

        </div>

    </div>
</div>
@endsection
