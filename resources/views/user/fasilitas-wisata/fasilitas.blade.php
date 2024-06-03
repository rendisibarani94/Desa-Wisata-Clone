@extends('user-layout.master')
@section('Judul_Halaman','Fasilitas')
@section('Konten')
<div class=" mt-10 ml-10">
    <h1 class="text-4xl font-bold text-blue-950 text-center my-2">Fasilitas Wisata</h1>

    <div class="flex flex-wrap justify-center mt-5">
        <!-- Card 1 -->
        <a href="{{ route('user.fasilitas.penginapan.index') }}">
            <div class="flex-shrink-0 transition-transform hover:scale-105">
                <div class="relative flex flex-col h- ml-4 mt-5 mb-5 overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-56">
                    <img src="{{ asset('images/fasilitas/penginapan.png') }}" alt="profile-picture" />
                    <div class="p-3 text-center">
                        <h4 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Penginapan
                        </h4>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card 2 -->
        <a href="{{ route('user.fasilitas.kesehatan.index') }}">
            <div class="flex-shrink-0 transition-transform hover:scale-105">
                <div class="relative flex flex-col ml-4 mt-5 mb-5 overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-56">
                    <img src="{{ asset('images/fasilitas/faskes.png') }}" alt="profile-picture" />
                    <div class="p-3 text-center">
                        <h4 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Fasilitas Kesehatan
                        </h4>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card 3 -->
        <a href="{{ route('user.fasilitas.rumah-makan.index') }}">
            <div class="flex-shrink-0 transition-transform hover:scale-105">
                <div class="relative flex flex-col ml-4 mt-5 mb-5 overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-56">
                    <img src="{{ asset('images/fasilitas/rumahmakan.png') }}" alt="profile-picture" />
                    <div class="p-3 text-center">
                        <h4 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Rumah Makan
                        </h4>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card 4 -->
        <a href="{{ route('user.fasilitas.bank.index') }}">
            <div class="flex-shrink-0 transition-transform hover:scale-105">
                <div class="relative flex flex-col ml-4 mt-5 mb-5 overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-56">
                    <img src="{{ asset('images/fasilitas/bank.png') }}" alt="profile-picture" />
                    <div class="p-3 text-center">
                        <h4 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Bank
                        </h4>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card 5 -->
        <a href="{{ route('user.fasilitas.rumah-ibadah.index') }}">
            <div class="flex-shrink-0 transition-transform hover:scale-105">
                <div class="relative flex flex-col ml-4 mt-5 mb-5 overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-56">
                    <img src="{{ asset('images/fasilitas/rumah-ibadah.png') }}" alt="profile-picture" />
                    <div class="p-3 text-center">
                        <h4 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Rumah Ibadah
                        </h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <br>
</div>
@endsection
