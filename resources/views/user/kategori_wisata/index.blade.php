@extends('user-layout.master')
@section('Judul_Halaman', 'Kategori Objek Wisata')
@section('Konten')
<div class="mx-16 my-4">
    <h1 class="font-bold text-4xl my-6 text-center text-blue-950">Kategori Wisata</h1>
    <div class="mx-10 flex items-center justify-center ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-10">
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('objek-wisata.alam.index') }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/kategori-wisata/wisata-alam.png') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{ route('objek-wisata.alam.index') }}">
                        <h5 class="text-black text-2xl font-bold tracking-tight"></h5>
                    </a>
                    <div class="flex flex-col items-center">
                        <p class="text-artikel font-semibold mb-4 hover:text-blue-500">Wisata Alam</p>
                        <div class="">
                            <a href="{{ route('objek-wisata.alam.index') }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-md font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                Lihat Lebih Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('objek-wisata.budaya.index') }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/kategori-wisata/wisata-budaya.png') }}" alt="" />
                </a>
                <div class="flex flex-col items-center mt-4">
                    <p class="text-artikel font-semibold mb-4 hover:text-blue-500">Wisata Budaya</p>
                    <div class="">
                        <a href="{{ route('objek-wisata.budaya.index') }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-md font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            Lihat Lebih Lengkap
                        </a>
                    </div>
                </div>

            </div>

            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('objek-wisata.kreatif.index') }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/kategori-wisata/wisata-kreatif.png') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{ route('objek-wisata.kreatif.index') }}">
                        <h5 class="text-black text-2xl font-bold tracking-tight"></h5>
                    </a>
                    <div class="flex flex-col items-center">
                        <p class="text-artikel font-semibold mb-4 hover:text-blue-500">Wisata Kreatif</p>
                        <div class="">
                            <a href="{{ route('objek-wisata.kreatif.index') }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-md font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                Lihat Lebih Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
