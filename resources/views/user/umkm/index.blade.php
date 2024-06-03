@extends('user-layout.master')
@section('Judul_Halaman','Produk UMKM')
@section('Konten')

<div class="mx-16 my-4">
    <p class="text-4xl font-bold text-indigo-950 font-roboto text-center my-8">
        Produk UMKM
    </p>

    <p class="text-2xl font-semibold text-indigo-950 font-roboto my-8">
        Kategori
    </p>
    <div class="items-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="transition-transform hover:scale-105">
                <a href="{{ route('produk-umkm.makanan.index') }}" class="flex-shrink-0">
                    <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <img src="{{ asset('images/produk-umkm/makanan.jpg') }}" alt="profile-picture" class=" item-center object-cover rounded-xl w-48 h-48" />
                        <div class="p-3">
                            <h4 class="block mb-2 ml-10 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Makanan
                            </h4>
                        </div>
                    </div>
                </a>
            </div>


            <!-- Card 2 -->
            <div class="transition-transform hover:scale-105">
                <a href="{{ route('produk-umkm.pakaian.index') }}" class="flex-shrink-0">
                    <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <img src="{{ asset('images/produk-umkm/pakaian.jpg') }}" alt="profile-picture" class=" item-center object-cover rounded-xl w-48 h-48" />
                        <div class="p-3">
                            <h4 class="block mb-2 ml-10 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Pakaian
                            </h4>
                        </div>
                    </div>
                </a>
            </div>


            <!-- Card 3 -->
            <div class="transition-transform hover:scale-105">
                <a href="{{ route('produk-umkm.sovenir.index') }}" class="flex-shrink-0">
                    <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <img src="{{ asset('images/produk-umkm/sovenir.jpg') }}" alt="profile-picture" class=" item-center object-cover rounded-xl w-48 h-48" />
                        <div class="mt-4">
                            <h4 class="block mb-2 ml-10 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Souvenir
                            </h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="transition-transform hover:scale-105">
                <a href="{{ route('produk-umkm.all.index') }}" class="flex-shrink-0">
                    <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15 21q-.825 0-1.412-.587T13 19v-4q0-.825.588-1.412T15 13h4q.825 0 1.413.588T21 15v4q0 .825-.587 1.413T19 21zm0-10q-.825 0-1.412-.587T13 9V5q0-.825.588-1.412T15 3h4q.825 0 1.413.588T21 5v4q0 .825-.587 1.413T19 11zM5 11q-.825 0-1.412-.587T3 9V5q0-.825.588-1.412T5 3h4q.825 0 1.413.588T11 5v4q0 .825-.587 1.413T9 11zm0 10q-.825 0-1.412-.587T3 19v-4q0-.825.588-1.412T5 13h4q.825 0 1.413.588T11 15v4q0 .825-.587 1.413T9 21z" /></svg>
                        <div class="mt-4">
                            <h4 class="block mb-2 ml-10 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Semua
                            </h4>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


    <div class="flex justify-between">
        <div class="">
            <p class="text-xl font-semibold text-indigo-950 font-roboto my-8">
                Makanan untuk anda
            </p>
        </div>
        <div class="">
            <a href="{{ route('produk-umkm.makanan.index') }}">
                <p class=" font-semibold text-slate-950 font-roboto my-8">
                    Lihat lainnya...
                </p>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-4">
        @foreach ($makanan->take(5) as $item)

        <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
            <a href="{{ route('produk-umkm.detail', $item->id) }}">
                <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/produk-umkm/'.$item->gambar) }}" alt="" />
            </a>
            <div class="p-2">
                <div class="flex justify-between">
                    <a href="{{ route('produk-umkm.detail', $item->id) }}">
                        <h5 class="text-black mr-2 text-xl font-semibold tracking-tight">{{ $item->namaProduk }}</h5>
                    </a>

                    <p class="mb-2 mt-1 ml-2 font-normal text-red-600 dark:text-black-400">{{ 'Rp ' . number_format($item->harga, 0, ',', '.'); }} / {{ $item->namaQuantity }}</p>
                </div>
                <br>
                <div class="text-right">
                    <a href="{{ route('produk-umkm.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
                        Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="flex justify-between">
        <div class="">
            <p class="text-xl font-semibold text-indigo-950 font-roboto my-8">
                Galeri Souvenir
            </p>
        </div>
        <div class="">
            <a href="{{ route('produk-umkm.sovenir.index') }}">
                <p class=" font-semibold text-slate-950 font-roboto my-8">
                    Lihat lainnya...
                </p>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-4">
        @foreach ($sovenir->take(5) as $item)
        {{-- <div class="">
            <div class="">
                <a href="{{ route('produk-umkm.detail', $item->id) }}" class="flex-shrink-0">
        <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
            <img src="{{ asset('images/produk-umkm/'.$item->gambar) }}" alt="profile-picture" class=" item-center object-cover rounded-xl w-48 h-48" />
            <div class="p-3">
                <h4 class="block mb-2 ml-10 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $item->namaProduk }}
                </h4>
            </div>
        </div>
        </a>
    </div>
</div> --}}
<div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
    <a href="{{ route('produk-umkm.detail', $item->id) }}">
        <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/produk-umkm/'.$item->gambar) }}" alt="" />
    </a>
    <div class="p-2">
        <div class="flex justify-between">
            <a href="{{ route('produk-umkm.detail', $item->id) }}">
                <h5 class="text-black mr-2 text-xl font-semibold tracking-tight">{{ $item->namaProduk }}</h5>
            </a>

            <p class="mb-2 mt-1 ml-2 font-normal text-red-600 dark:text-black-400">{{ 'Rp ' . number_format($item->harga, 0, ',', '.'); }} / {{ $item->namaQuantity }}</p>
        </div>
        <br>
        <div class="text-right">
            <a href="{{ route('produk-umkm.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
                Selengkapnya
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endforeach
</div>

<div class="flex justify-between">
    <div class="">
        <p class="text-xl font-semibold text-indigo-950 font-roboto my-8">
            Pakaian
        </p>
    </div>
    <div class="">
        <a href="{{ route('produk-umkm.pakaian.index') }}">
            <p class=" font-semibold text-slate-950 font-roboto my-8">
                Lihat lainnya...
            </p>
        </a>
    </div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-4">
    @foreach ($pakaian->take(5) as $item)
    <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
        <a href="{{ route('produk-umkm.detail', $item->id) }}">
            <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/produk-umkm/'.$item->gambar) }}" alt="" />
        </a>
        <div class="p-2">
            <div class="flex justify-between">
                <a href="{{ route('produk-umkm.detail', $item->id) }}">
                    <h5 class="text-black mr-2 text-xl font-semibold tracking-tight">{{ $item->namaProduk }}</h5>
                </a>

                <p class="mb-2 mt-1 ml-2 font-normal text-red-600 dark:text-black-400">{{ 'Rp ' . number_format($item->harga, 0, ',', '.'); }} / {{ $item->namaQuantity }}</p>
            </div>
            <br>
            <div class="text-right">
                <a href="{{ route('produk-umkm.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
                    Selengkapnya
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


</div>


@endsection
