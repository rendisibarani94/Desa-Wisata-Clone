@extends('user-layout.master')
@section('Judul_Halaman', 'Atraksi Wisata')
@section('Konten')
<div class="mx-16 my-4">
    <p class="text-4xl font-bold text-indigo-950 font-roboto text-center my-6">Atraksi Wisata</p>

    <div class="mx-10 flex items-center justify-center ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach ($data as $item)
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('atraksiWisata.detail', $item->id) }}">

                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/atraksi-wisata/'.$item->gambar) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{ route('atraksiWisata.detail', $item->id) }}">

                        <h5 class="text-black text-2xl font-bold tracking-tight hover:text-blue-500 mb-2">{!! Str::limitParagraph($item->namaAtraksi, 50, '...') !!}</h5>
                    </a>

                    <p class="mb-3 font-normal text-black dark:text-black-400">{{ $item->deskripsiSingkat }}</p>
                    <br>
                    <div class="text-right">

                        <a href="{{ route('atraksiWisata.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
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
