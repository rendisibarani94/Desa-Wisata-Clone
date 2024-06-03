@extends('user-layout.master')
@section('Judul_Halaman','Detail Rumah Makan')
@section('Konten')
<div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">
    <div class=" rounded overflow-hidden flex flex-col mx-auto">
        <p class="text-xl sm:text-4xl font-semibold inline-block mb-2 text-center">{{ $data->namaRumahMakan }}</p>

        <div class="relative">
            <img src="{{ asset('images/fasilitas/rumah-makan/'.$data->gambar) }}" class="w-full">
            <br>

            <div class="bg-white shadow-lg p-5 rounded-lg mt-5">
                <div class="flex items-center justify-between">
                    <div class="text-gray-800 mr-3">
                        <i class="fas fa-map-marker-alt font-poppins">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
                        </i> Lokasi: {{ $data->lokasi }}
                    </div>
                    <div class="text-gray-800 mr-3 font-poppins">
                        <i class="fas fa-clock"></i> {{ $data->waktuOperasi }} Waktu : {{ $data->jamBuka }} - {{ $data->jamTutup }}
                    </div>
                </div>
            </div>
            <div class="font-poppins">
                {!! $data->isiKonten !!}

            </div>
        </div>

        <hr>

    </div>

</div>
@endsection
