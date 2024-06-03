@extends('user-layout.master')
@section('Judul_Halaman','Berita Wisata')
@section('Konten')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mt-4">
    <h1 class="text-4xl font-bold text-sky-950">Berita Desa Samosir</h1>
    <h6 class="muy-2 mx-2 text-left font-semibold text-gray-800">Berita terbaru seputar desa wisata Sosor Dolok</h6>
    <div class="align-middle">
        @foreach ($data as $item)

        <div class="max-w-screen-lg mx-auto my-4 ">
            <div class="flex gap-3 p-5 bg-white shadow-xl shadow-slate-300 rounded-xl overflow-hidden items-center justify-start transition-transform hover:scale-105">

                <div class="relative w-48 h-48 flex-shrink-0">
                    <img src="{{ asset('images/berita-wisata/'.$item->gambar) }}" class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50 rounded-lg" loading="lazy">
                </div>

                <div class="flex flex-col">

                    <p class="text-xl font-bold">{{ $item->judulBerita }}</p>
                    <div class="inline-flex items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-normal ml-2">{{ $item->formatted_date }}</p>
                        </div>
                    </div>
                    <p class="text-gray-500 my-2">
                        {{ $item->deskripsi }}
                    </p>
                    <div class="text-normal">
                        <a href="{{ route('beritaWisata.detail', $item->id) }}" class="inline-flex items-center font-bold hover:text-blue-700">
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
