@extends('user-layout.beranda')
@section('Judul_Halaman','Beranda')
@section('Konten')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <p class="text-4xl font-bold text-indigo-950 font-poppins text-center mb-6">
        MENJELAJAHI KEINDAHAN ALAM DAN TRADISI
        YANG KAYA DI DESA WISATA KAMI
    </p>
    <p class="text-xl font-bold text-indigo-950 font-poppins text-center mb-2">
        Desa Digital merupakan desa yang memanfaatan Teknologi Informasi dan Komunikasi (TIK) dalam semua aspek pembangunan desa
    </p>
</div>
<hr class="bold-hr border-gray-800 border-b-4 mx-auto sm:my-6 lg:my-4" />
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mb-6">
    <p class="text-4xl font-bold text-indigo-950 font-poppins">
        OBJEK WISATA
    </p>
    <div class=" w-28 mb-2">
        <hr class=" border-yellow-700 border-b-2 mx-auto sm:my-6 lg:my-4" />
    </div>
    <div class="mx-10 flex items-center justify-center ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach ($objek->take(3) as $item)
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('objek-wisata.detail', $item->id) }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/objek-wisata/'.$item->gambar) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{ route('objek-wisata.detail', $item->id) }}">
                        <h5 class="text-black text-2xl font-bold tracking-tight hover:text-blue-500">{{ $item->namaObjekWisata }}</h5>
                    </a>

                    <p class="mb-3 font-normal text-black dark:text-black-400">{{ Str::limitParagraph(strip_tags($item->deskripsi), 100) }}</p>
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


</div>
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mb-6 ">
    <p class="text-4xl font-bold text-indigo-950 font-poppins">
        ATRAKSI WISATA
    </p>
    <div class=" w-28 mb-2">
        <hr class=" border-yellow-700 border-b-2 mx-auto sm:my-6 lg:my-4" />
    </div>

    <div class="mx-10 flex items-center justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach ($atraksi->take(3) as $item)
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('atraksiWisata.detail', $item->id) }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/atraksi-wisata/'.$item->gambar) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{ route('atraksiWisata.detail', $item->id) }}">
                        {{-- {!! Str::limitParagraph($item->namaAtraksi, 100, '...') !!} --}}
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


</div>


<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mb-6">
    <p class="text-4xl font-bold text-indigo-950 font-poppins">
        PAKET WISATA
    </p>
    <div class=" w-28 mb-2">
        <hr class=" border-yellow-700 border-b-2 mx-auto sm:my-6 lg:my-4" />
    </div>
    <div class="mx-10 flex items-center justify-center ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach ($paket->take(3) as $item)
            <div class="max-w-sm bg-white rounded-lg shadow-xl shadow-slate-400 transition-transform hover:scale-105">
                <a href="{{ route('paket-wisata.detail', $item->id) }}">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('images/paket-wisata/'.$item->gambar1) }}" alt="" />
                </a>
                <div class="p-6">
                    <div class="flex justify-between">
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
                    <div class="text-right mt-4">
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
    <div class="mt-12">
        <p class="font-poppins text-4xl font-bold text-center text-blue-950 mb-8">Testimoni</p>
        <div class="swiper-container relative w-full pb-16">
            <div class="swiper-wrapper">
                @foreach ($testimoni as $data)
                <div class="swiper-slide card p-5 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 border border-gray-500 flex flex-col justify-between">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path fill="currentColor" fill-rule="evenodd" d="M18.853 9.116C11.323 13.952 7.14 19.58 6.303 26.003C5 36 13.94 40.893 18.47 36.497C23 32.1 20.285 26.52 17.005 24.994c-3.28-1.525-5.286-.994-4.936-3.033c.35-2.038 5.016-7.69 9.116-10.322a.749.749 0 0 0 .114-1.02L20.285 9.3c-.44-.572-.862-.55-1.432-.185m19.826.001c-7.53 4.836-11.714 10.465-12.55 16.887c-1.303 9.997 7.637 14.89 12.167 10.494c4.53-4.397 1.815-9.977-1.466-11.503c-3.28-1.525-5.286-.994-4.936-3.033c.35-2.038 5.017-7.69 9.117-10.322a.749.749 0 0 0 .113-1.02L40.11 9.3c-.44-.572-.862-.55-1.431-.185" clip-rule="evenodd" />
                        </svg>
                        <p class="mt-3 font-poppins text-center">
                            {{ $data->testimoni }}
                        </p>
                    </div>
                    <p class="mt-3 font-poppins font-semibold self-end text-center">
                        ~ {{ $data->nama }} ~
                    </p>
                </div>
                @endforeach
            </div>
    
    
            <!-- Add Pagination -->
            <div class="swiper-pagination mt-4 absolute bottom-4 left-0 w-full text-center"></div>
        </div>
    
        <!-- Custom Navigation Buttons -->
        <div class="flex justify-center mt-4">
            <button id="swiper-button-prev" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mr-2">&laquo; Sebelumnya</button>
            <button id="swiper-button-next" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 ml-2">Selanjutnya &raquo;</button>
        </div>
    </div>
    
        <div class="mt-8 ">
            <form action="{{ route('user.testimoni.store') }}" method="POST">
                @csrf
                {{-- <label for="message" class="block mb-2 text-lg font-poppins font-medium text-gray-900">Your message</label> --}}
                <h3 class="my-4 mx-2 text-2xl font-roboto font-semibold text-sky-950">Masukkan Testimoni Anda</h3>
                <input type="text" name="nama" id="" class="block px-2.5 py-4 w-full text-sm text-gray-900
            bg-gray-50 rounded-lg border border-gray-500 focus:ring-blue-500 focus:border-blue-500 mb-4" placeholder="Nama Anda" required autocomplete="off">

                <textarea id="testimoni" name="testimoni" rows="4" class="block px-2.5 py-4 w-full text-sm text-gray-900
            bg-gray-50 rounded-lg border border-gray-500 focus:ring-blue-500 focus:border-blue-500
            " placeholder="Pesan Anda" required autocomplete="off"></textarea>
                <div class="flex justify-center">
                    <button class="border-double mt-4 border-2 w-fit bg-orange-600 text-white py-2 px-4 rounded-lg shadow-black shaodw-lg">Kirim </button>
                </div>
            </form>
        </div>
    </div>

    @endsection

    @section('js')
    <script>
  document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '#swiper-button-next',
                prevEl: '#swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            }
        });

            @if(session('success'))
            Swal.fire({
                title: 'Sukses!'
                , text: "{{ session('success') }}"
                , icon: 'success'
                , confirmButtonText: 'OK'
            });
            @elseif(session('error'))
            Swal.fire({
                title: 'Gagal!'
                , text: "{{ session('error') }}"
                , icon: 'error'
                , confirmButtonText: 'OK'
            });
            @endif
    });
        const textarea = document.getElementById('testimoni');

        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Initialize the height to auto-adjust
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';

    </script>
    @endsection
