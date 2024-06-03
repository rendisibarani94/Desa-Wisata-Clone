@extends('user-layout.master')
@section('Judul_Halaman','Fasilitas Bank')
@section('Konten')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mt-4">
    <h1 class="text-4xl font-bold text-sky-950">Fasilitas Bank</h1>
    <h6 class="muy-2 mx-2 text-left font-semibold text-gray-800">Fasilitas Bank yang dapat ditemukan di Desa Wisata</h6>
    <div class="align-middle">
        @foreach ($data as $item)

        <div class="max-w-screen-lg mx-auto my-4 ">
            <div class="flex gap-3 p-5 bg-white shadow-xl shadow-slate-300 rounded-xl overflow-hidden items-center justify-start transition-transform hover:scale-105">

                <div class="relative w-48 h-48 flex-shrink-0">
                    <img src="{{ asset('images/fasilitas/bank/'.$item->gambar) }}" class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50 rounded-lg" loading="lazy">
                </div>

                <div class="flex flex-col">
                    <p class="text-xl font-bold mb-5">{{ $item->namaBank }}</p>
                    <div class="inline-flex items-center mb-3">
                        <div class="flex items-center mb-2">
                            <svg className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">{{ $item->lokasi }}</span>
                        </div>
                    </div>
                    <p class="text-gray-500 my-2">
                        {{ $item->deskripsi }}
                    </p>
                    <div class="text-normal">
                        {{-- {{ route('beritaWisata.detail', $item->id) }} --}}
                        <a href="{{ route('user.fasilitas.bank.detail', $item->id) }}" class="inline-flex items-center font-bold hover:text-blue-700">
                            Selengkapnya
                            <span class="ml-1">&#62;</span>
                        </a>
                    </div>
                    <span class="flex items-center justify-start text-gray-500"></span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination Links -->
    <div class="flex justify-center mt-8">
        <div class="flex space-x-5 mt-4">
            @if ($data->onFirstPage())
            <button disabled class="text-gray-400 cursor-not-allowed px-3 py-2 bg-gray-200 rounded-lg">&laquo; Sebelumnya</button>
            @else
            <a href="{{ $data->previousPageUrl() }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">&laquo; Sebelumnya</a>
            @endif

            <div class="flex space-x-2">
                @for ($i = max(1, $data->currentPage() - 1); $i <= min($data->lastPage(), $data->currentPage() + 1); $i++)
                    <a href="{{ $data->url($i) }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 {{ $data->currentPage() == $i ? 'bg-blue-600' : '' }}">{{ $i }}</a>
                    @endfor
            </div>

            @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Selanjutnya &raquo;</a>
            @else
            <button disabled class="text-gray-400 cursor-not-allowed px-3 py-2 bg-gray-200 rounded-lg">Selanjutnya &raquo;</button>
            @endif
        </div>
    </div>
</div>

@endsection
