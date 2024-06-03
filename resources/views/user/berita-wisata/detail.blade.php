@extends('user-layout.master')
@section('Judul_Halaman','Detail Berita')
@section('Konten')
<div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">

    {{-- @foreach($data as $item) --}}
    <div class="mb-4 rounded overflow-hidden flex flex-col">
        <p class="text-xl sm:text-4xl font-semibold inline-block transition duration-500 ease-in-out mb-3">{{ $data->judulBerita }}</a>

            <div class="relative">
                <a href="#">
                    <img src="{{asset('images/berita-wisata/'.$data->gambar)}}" class="w-full h-[450px]">
                </a>
            </div>
            <div class="font-poppins mt-4">
                {!! $data->isiBerita !!}
            </div>
            <div class="py-5 text-sm font-regular text-gray-900 flex">
                <span class="mr-3 flex flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-600">
                        <!-- Menambahkan kelas text-indigo-600 -->
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <span class="ml-1 font-poppins">{{ $data->formatted_date }}</span>
                </span>
                <div class="flex flex-row items-center">
                    <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                        </path>
                        <path d="M0 0h24v24H0z" fill="none"></path>
                    </svg>
                    <span class="ml-1 font-poppins">{{ $data->penulis }}</span>
                </div>
            </div>
            <hr>

    </div>
    {{-- @endforeach --}}
</div>
@endsection
