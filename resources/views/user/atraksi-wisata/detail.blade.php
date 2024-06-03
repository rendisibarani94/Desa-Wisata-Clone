@extends('user-layout.master')
@section('Judul_Halaman','Detail Atraksi')
@section('Konten')
<div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">
    <div class="mb-10 rounded overflow-hidden flex flex-col mx-auto">
        <p href="#" class="text-xl sm:text-4xl font-semibold transition duration-500 inline-block mb-4 text-center">{{ $data->namaAtraksi }}</p>

        <div class="relative">
            <img src="{{ asset('images/atraksi-wisata/'.$data->gambar) }}" class="w-full">
            <br>

            <div class="bg-white shadow-lg p-5 rounded-lg mt-5">
                <div class="flex items-center justify-between">
                    <div class="text-gray-800 mr-3">
                        <i class="fas fa-map-marker-alt font-poppins">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
                        </i> Lokasi: {{ $data->lokasi }}
                    </div>
                    <div class="text-gray-800 mr-3">
                        <i class="fas fa-clock font-poppins"></i> {{ $data->jadwalAtraksi }}
                    </div>
                    <div class="text-gray-800">
                        <i class="fas fa-money-bill-wave font-poppins"></i> Tarif: <span style="color: red;">{{ 'Rp ' . number_format($data->tarif, 0, ',', '.');  }}</span>
                    </div>
                </div>
            </div>
            <div class="font-poppins">
                {!! $data->isiAtraksi !!}
            </div>
        </div>

        <hr>

    </div>

</div>
@endsection
