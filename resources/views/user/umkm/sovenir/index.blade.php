@extends('user-layout.master')
@section('Judul_Halaman','Produk UMKM Sovenir')
@section('Konten')

<div class="mx-16 my-4">
    <p class="text-4xl font-bold text-indigo-950 font-roboto text-center my-8">
        Produk UMKM Souvenir
    </p>

    <div class="items-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Card  -->
            @foreach ($data as $item)

            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('produk-umkm.detail', $item->id) }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/produk-umkm/'.$item->gambar) }}" alt="" />
                </a>
                <div class="p-2">
                    <div class="flex justify-between">
                        {{-- {{ route('objek-wisata.detail', $item->id) }} --}}
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
</div>


@endsection
