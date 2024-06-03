@extends('user-layout.master')
@section('Judul_Halaman','Paket Wisata')
@section('Konten')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <p class="text-4xl font-bold text-indigo-950 font-roboto text-center mb-4">
        PAKET WISATA
    </p>
    {{-- <p class="text-2xl font-bold text-indigo-950 font-roboto mb-4">
    Paket Wisata Yang Tersedia
</p> --}}
    <div class="flex items-center justify-center ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach ($paket as $item)
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('paket-wisata.detail', $item->id) }}">
                    {{-- {{ asset('images/objek-wisata/'.$item->gambar) }} --}}
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/paket-wisata/'.$item->gambar1) }}" alt="" />
                </a>
                <div class="p-2">
                    <div class="flex justify-between">
                        {{-- {{ route('objek-wisata.detail', $item->id) }} --}}
                        <a href="{{ route('paket-wisata.detail', $item->id) }}">
                            <h5 class="text-black mr-2 text-xl font-semibold tracking-tight hover:text-blue-500">{{ $item->namaPaket }}</h5>
                        </a>

                        <p class="mb-2 mt-1 ml-2 font-normal text-red-600 dark:text-black-400">{{ 'Rp ' . number_format($item->harga, 0, ',', '.'); }} </p>
                    </div>
                    <br>
                    <div class="flex items-center mb-2">
                        <svg className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2">{{ $item->lokasi }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg className="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="blue" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                        </svg>
                        <a href="#" class="ml-2 font-medium text-blue-600 underline dark:text-blue-600 hover:no-underline">{{ $item->kontak }}</a>
                    </div>
                    <div class="text-right">
                        {{-- {{ route('objek-wisata.detail', $item->id) }} --}}
                        <a href="{{ route('paket-wisata.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
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

    <!-- Pagination Links -->
    <div class="flex justify-center mt-8">
        <div class="flex space-x-5 mt-4">
            @if ($paket->onFirstPage())
            <button disabled class="text-gray-400 cursor-not-allowed px-3 py-2 bg-gray-200 rounded-lg">&laquo; Sebelumnya</button>
            @else
            <a href="{{ $paket->previousPageUrl() }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">&laquo; Sebelumnya</a>
            @endif

            <div class="flex space-x-2">
                @for ($i = max(1, $paket->currentPage() - 1); $i <= min($paket->lastPage(), $paket->currentPage() + 1); $i++)
                    <a href="{{ $paket->url($i) }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 {{ $paket->currentPage() == $i ? 'bg-blue-600' : '' }}">{{ $i }}</a>
                    @endfor
            </div>

            @if ($paket->hasMorePages())
            <a href="{{ $paket->nextPageUrl() }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Selanjutnya &raquo;</a>
            @else
            <button disabled class="text-gray-400 cursor-not-allowed px-3 py-2 bg-gray-200 rounded-lg">Selanjutnya &raquo;</button>
            @endif
        </div>
    </div>
</div>

@endsection
