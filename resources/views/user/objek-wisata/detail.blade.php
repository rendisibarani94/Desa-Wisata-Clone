@extends('user-layout.master')
@section('Judul_Halaman', 'Detail Objek Wisata')
@section('Konten')
<div class="mx-4 my-4">
    <h1 class="font-semibold text-4xl text-blue-950 ml-6">Detail {{ $data->namaObjekWisata }}</h1>
    <div class=" w-28 mb-8 ml-6">
        <hr class=" border-yellow-700 border-b-2 mx-auto sm:my-6 lg:my-4" />
    </div>

    {{-- Card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-1 border-2 border-solid border-gray-400 p-4 gap-6 rounded-2xl">
        <div class="ml-5 mt-3">
            <img class="h-auto max-w-full w-auto rounded-lg" style="height: 400px;" src="{{asset('images/objek-wisata/'.$data->gambar)}}" alt="">
        </div>
        <div class="text-left">
            <p class="mb-3 text-lg text-poppins text-black dark:text-black-400">{{ Str::limitParagraph(strip_tags($data->deskripsi), 1000) }}</p>
            <a href="#" class="font-semibold text-black-900 underline dark:text-black decoration-indigo-500" data-toggle="modal" data-target="#deskripsi-modal">Selengkapnya ...</a>
            <br>
            <div class="max-w-sm p-4 bg-white border-2 border-solid border-gray-400 rounded-lg mt-4">
                <h5 class="text-left mb-3 text-1xl font-bold tracking-tight text-black-900 dark:text-black">Informasi Penting Objek Wisata</h5>
                <p class="text-left mb-5 font-normal text-black-700 dark:text-grablack-400">Alamat : {{ $data->lokasi }}</p>
                <p class="text-left mb-4 font-normal text-black-700 dark:text-grablack-400">Jam Buka : {{ $data->waktuOperasi }} {{ $data->jamBuka }}-{{ $data->jamTutup }}</p>
                <p class="text-left mb-4 font-normal text-black-700 dark:text-grablack-400">Kontak : {{ $data->kontak }}</p>
            </div>
        </div>
    </div>
    {{-- Card --}}

    {{-- Modals --}}
    <div id="deskripsi-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-400 bg-opacity-75 flex justify-center items-center p-4 md:p-8">
        <div class="w-full max-w-2xl rounded-lg bg-white shadow-md modal-content">
            <div class="modal-header flex justify-between items-center border-b-2 border-solid border-gray-300 py-2 px-4">
                <p class="text-xl font-bold text-left text-black-900 dark:text-black">Deskripsi Objek Wisata {{ $data->namaObjekWisata }}</p>
                <button type="button" class="close focus:outline-none" onclick="closeModal('#deskripsi-modal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4 overflow-y-auto max-h-96">
                <!-- Added max-h-96 and overflow-y-auto -->
                <p class="text-left">{!! $data->deskripsi !!}</p>
            </div>
        </div>
    </div>

    {{-- Modals --}}


    <hr class="border-black-900 sm:mx-auto my-5 lg:my-7" />
    <h1 class="font-semibold text-4xl text-blue-950 ml-6">Wisata Lainnya...</h1>
    <div class=" w-28 mb-8 ml-6">
        <hr class=" border-yellow-700 border-b-2 mx-auto sm:my-6 lg:my-4" />
    </div>
    <div class="mx-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach ($datas as $item)
        <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
            <a href="{{ route('objek-wisata.detail', $item->id) }}">
                <img class="rounded-t-lg w-full h-72 object-cover" src="{{asset('images/objek-wisata/'.$item->gambar)}}" alt="" />
            </a>
            <div class="p-5">
                <a href="{{ route('objek-wisata.detail', $item->id) }}">
                    <h5 class="text-black text-2xl font-bold tracking-tight">{{ $item->namaObjekWisata }}</h5>
                </a>
                <br>
                <div class="flex items-center">
                    <svg className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">{{ $item->lokasi }}</span>
                </div>
                @if($item->idKategoriWisata == 1)
                <div class="bg-green-700 text-white rounded-lg shadow font-semibold m-4 p-1 w-1/2  ml-2">
                    <p class="text-center">Wisata Alam</p>
                </div>
                @elseif($item->idKategoriWisata == 2)
                <div class="bg-yellow-400 rounded-lg shadow font-semibold m-4 p-1 w-1/2  ml-2">
                    <p class="text-center">Wisata Budaya</p>
                </div>
                @elseif($item->idKategoriWisata == 3)
                <div class="bg-blue-600 text-white rounded-lg shadow font-semibold m-4 p-1 w-1/2  ml-2">
                    <p class="text-center">Wisata Kreatif</p>
                </div>
                @endif

                <br>
                <div class="text-right">
                    <a href="{{ route('objek-wisata.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-orange-600 hover:bg-orange-700 focus:ring-orange-800">
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

@endsection

@section('js')
<script>
    // This script toggles the modal on click
    document.addEventListener('click', function(event) {
        var isModalBtn = event.target.matches('[data-toggle="modal"]');
        var modalID = event.target.dataset.target;
        var modal = document.querySelector(modalID);
        var closeBtn = modal.querySelector('.close');

        if (isModalBtn) {
            modal.classList.remove('hidden');
        } else if (event.target === closeBtn || event.target === closeBtn.firstElementChild) {
            closeModal(modal);
        }
    });

    // Function to close modal
    function closeModal(modalID) {
        var modal = document.querySelector(modalID);
        modal.classList.add('hidden');
    }

    // Close modal when pressing the Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                closeModal(modal);
            });
        }
    });

</script>

@endsection
