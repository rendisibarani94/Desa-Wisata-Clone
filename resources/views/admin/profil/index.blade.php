@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Profil Desa Wisata')
@section('Konten')

{{-- <h2 class="text-4xl">Profil Desa Wisata</h2> --}}

<ol class="breadcrumb float-sm-left text-blue-500 font-semibold">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item active">Profil Desa Wisata</li>
</ol><br><br><br>

<div class="flex justify-between mx-3">
    <h2 class="text-4xl mt-2 mx-2 font-roboto">Profil Desa Wisata</h2>
    <a href="{{ route('admin.profil.edit', $data->id) }}" class="btn btn-warning text-white mt-2 w-1/6 font-semibold ">Ubah Profil</a>
</div>
<br><br>

{{-- @if --}}
<div class="flex">
    {{-- <a href="{{ route('admin.profil.store') }}" class="btn bg-gradient-success ml-auto mr-4">Tambah Data</a> --}}
</div>

<br><br>
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Data Profil Desa Wisata</h3> --}}
        {{-- <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">

        {{-- <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>deskripsi</th>
            <th>sejarah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $data->id }}</td>
        {{-- {{ Str::limitParagraph(strip_tags($data->deskripsi), 100) }}
        {{ Str::limitParagraph(strip_tags($data->sejarah), 100) }} --}}
        {{-- <td>{{ Str::limitParagraph($data->deskripsi, 100) }}</td>
        <td>{!! Str::limitParagraph($data->sejarah, 100) !!}</td>
        <td><a href="{{ route('admin.profil.edit', $data->id) }}" class="btn btn-warning text-white">Ubah</a></td>
        </tr>

        </tbody>
        </table> --}}

        <div class="mx-16 mb-4">
            <p class="text-4xl font-bold text-indigo-950 font-roboto text-center my-6">Profil Desa Wisata</p>

            <div class="mb-4 rounded overflow-hidden flex flex-col">

                <div class="relative">
                    <a href="#">
                        <img src="{{ asset('images/profil/'.$data->gambar) }}" class="w-full h-[450px]">
                    </a>
                </div>
                <div class="text-justify font-poppins my-4">
                    {!! $data->deskripsi !!}

                </div>
            </div>
        </div>

        <div class="py-5 text-sm font-regular bg-sky-700 text-gray-900">

            <h5 class="text-white font-roboto font-semibold text-xl mx-auto text-center mb-6">Strategi Pengembangan Desa Wisata</h5>

            <div class="mx-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-20">
                    <!-- Card 1 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <h5 class="text-lg uppercase font-roboto text-white">ATRAKSI</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Atraksi atau yang biasa disebut Daya Tarik adalah aset-aset yang dapat menarik wisatawan domestik maupun internasional. Daya Tarik memberikan motivasi awal bagi para wisatawan untuk mengunjungi sebuah destinasi</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <h5 class="text-lg uppercase font-roboto text-white">AKSEBILITAS</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Desa wisata harus dapat dijangkau, tersedianya sarana, prasarana dan sistem transportasi yang memudahkan wisatawan dari dan menuju ke destinasi desa wisata, baik jalur laut, darat dan udara. Wisatawan juga harus dapat bepergian dengan mudah di sekitar destinasi pariwisata</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <h5 class="text-lg uppercase font-roboto text-white">AMENITAS</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Kelengkapan sarana, prasarana, peralatan, dan amenitas yang mendukung aktivitas dan layanan wisatawan. Hal ini meliputi infrastruktur dasar seperti layanan umum, transportasi publik dan jalan. Layanan langsung bagi wisatawan seperti informasi, rekreasi, pemandu wisata, operator wisata, katering (jasa boga) dan fasilitas belanja, SDM, Masyarakat dan lndustri (SMI)</p>
                        </div>
                    </div>

                    <!-- Add more columns as needed -->
                </div>

            </div>

        </div>

        <div class="mx-16 mt-2 mb-10">
            <p class="text-xl font-bold text-indigo-950 font-roboto mb-6 mt-5">
                Sejarah
            </p>
            <div class="text-justify font-poppins">
                {{-- Sejarah Here --}}
                {!! $data->sejarah !!}
            </div>
        </div>


        <div class="py-5 text-sm font-regular bg-sky-700 text-gray-900">

            <h5 class="text-white font-roboto font-semibold text-xl mx-auto text-center mb-6">KLASIFIKASI DESA WISATA</h5>

            <div class="mx-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-20">
                    <!-- Card 1 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <svg class="mb-4 mt-2" width="119" height="112" viewBox="0 0 119 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8771 10.4992C14.8771 7.71465 15.8174 5.04413 17.491 3.07515C19.1647 1.10616 21.4347 0 23.8017 0C26.1686 0 28.4386 1.10616 30.1123 3.07515C31.786 5.04413 32.7263 7.71465 32.7263 10.4992C32.7263 13.2838 31.786 15.9543 30.1123 17.9233C28.4386 19.8923 26.1686 20.9984 23.8017 20.9984C21.4347 20.9984 19.1647 19.8923 17.491 17.9233C15.8174 15.9543 14.8771 13.2838 14.8771 10.4992ZM26.7765 52.8679V67.1075L36.2589 78.2629C37.579 79.8159 38.4529 81.8064 38.7503 83.9719L41.5765 103.855C42.1157 107.661 39.9217 111.27 36.6865 111.904C33.4514 112.538 30.3836 109.957 29.8444 106.151L27.1856 87.3622L12.4228 69.9948C10.1917 67.37 8.92737 63.8046 8.92737 60.0861V40.8157C8.92737 33.7287 13.7987 27.9979 19.8228 27.9979C24.3037 27.9979 28.4685 30.6227 30.9599 34.9974L39.773 50.5494L41.6508 51.643V34.9974C41.6508 31.1258 44.3096 27.9979 47.6006 27.9979H71.3994C74.6904 27.9979 77.3492 31.1258 77.3492 34.9974V51.6649L79.2271 50.5712L88.0401 34.9974C90.5129 30.6227 94.6963 27.9979 99.1772 27.9979C105.201 27.9979 110.073 33.7287 110.073 40.8157V60.0861C110.073 63.8046 108.827 67.37 106.596 69.9948L91.833 87.3622L89.1742 106.151C88.635 109.957 85.5672 112.538 82.3321 111.904C79.0969 111.27 76.9029 107.661 77.4421 103.855L80.2683 83.9719C80.5657 81.8064 81.4396 79.8159 82.7597 78.2629L92.2421 67.1075V52.8679L88.7094 59.1018C87.8541 60.633 86.6642 61.8579 85.2697 62.6672L74.1884 69.1855C73.7421 69.4698 73.2773 69.6667 72.7753 69.7979C72.2919 69.9292 71.7899 69.9948 71.3065 69.9729H47.7307C47.2659 69.9948 46.8011 69.9292 46.3362 69.8198C45.7971 69.6886 45.295 69.4698 44.8302 69.1636L33.7675 62.6453C32.373 61.836 31.2016 60.5892 30.3278 59.08L26.7951 52.8461L26.7765 52.8679ZM0.430421 102.389L9.31782 76.2506L18.4655 87.0122L11.4746 107.573C10.2475 111.16 6.78919 112.91 3.73995 111.467C0.690721 110.023 -0.796709 105.976 0.430421 102.389ZM95.1983 0C97.5653 0 99.8353 1.10616 101.509 3.07515C103.183 5.04413 104.123 7.71465 104.123 10.4992C104.123 13.2838 103.183 15.9543 101.509 17.9233C99.8353 19.8923 97.5653 20.9984 95.1983 20.9984C92.8314 20.9984 90.5614 19.8923 88.8877 17.9233C87.214 15.9543 86.2738 13.2838 86.2738 10.4992C86.2738 7.71465 87.214 5.04413 88.8877 3.07515C90.5614 1.10616 92.8314 0 95.1983 0ZM109.682 76.2506L118.57 102.389C119.797 105.976 118.309 110.045 115.26 111.489C112.211 112.932 108.753 111.182 107.525 107.595L100.534 87.0341L109.682 76.2724V76.2506Z" fill="white" />
                            </svg>


                            <h5 class="text-lg uppercase font-roboto text-white">RINTISAN</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Desa Wisata yang baru mulai beroperasi dan masih dalam lingkup yang terbatas</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <svg class="mb-4 mt-2" width="114" height="112" viewBox="0 0 114 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M88.6685 30.2703C88.6685 46.9885 74.491 60.5405 57.0012 60.5405C39.5113 60.5405 25.3339 46.9885 25.3339 30.2703C25.3339 13.552 39.5113 0 57.0012 0C74.491 0 88.6685 13.552 88.6685 30.2703ZM82.335 30.2703C82.335 36.6928 79.6659 42.8523 74.9149 47.3937C70.1639 51.9351 63.7201 54.4865 57.0012 54.4865C50.2822 54.4865 43.8384 51.9351 39.0874 47.3937C34.3364 42.8523 31.6673 36.6928 31.6673 30.2703C31.6673 23.8477 34.3364 17.6882 39.0874 13.1468C43.8384 8.6054 50.2822 6.05405 57.0012 6.05405C63.7201 6.05405 70.1639 8.6054 74.9149 13.1468C79.6659 17.6882 82.335 23.8477 82.335 30.2703ZM37.4561 94.0164L36.8956 93.8378H25.3339V102.919H69.5731C69.8159 103.383 70.0798 103.847 70.3648 104.311C71.223 105.698 72.5562 107.484 74.5575 108.973H0V89.4123C0 76.6564 19.8237 70.4208 38.0008 67.9446C40.106 67.6573 42.2177 67.4151 44.3342 67.2182V72.6487C44.3342 72.8686 44.3458 73.0856 44.3691 73.2995C44.537 74.7841 45.273 76.157 46.4357 77.1543C47.5983 78.1517 49.1055 78.7031 50.6677 78.7027H63.3346C65.0193 78.7027 66.552 78.0731 67.6857 77.0469C67.7913 77.3799 67.9021 77.7199 68.0182 78.067C68.4932 79.4474 69.1899 81.1516 70.1906 82.8316C68.1459 84.0889 65.7659 84.7573 63.3346 84.7568H50.6677C47.5616 84.7574 44.5636 83.6672 42.2434 81.6932C39.9232 79.7193 38.4426 76.9992 38.0831 74.0502C34.853 74.5103 31.6166 75.0915 28.5006 75.7998V87.7838H38.0008C38.0008 87.7838 45.9176 90.8108 57.0012 90.8108C60.6746 90.8108 63.9996 90.4778 66.8054 90.0329C66.4886 91.1985 66.4176 92.4127 66.5964 93.6048L66.6122 93.6865L66.5995 93.6078V93.6199L66.6027 93.6381L66.6122 93.6865L66.6312 93.8136C66.7189 94.3513 66.8235 94.8863 66.9447 95.4179L67.1062 96.1202C64.1643 96.5531 60.7474 96.8649 57.0012 96.8649C50.8672 96.8649 45.6231 96.0294 41.8959 95.1909C40.4 94.8568 38.9189 94.465 37.4561 94.0164ZM17.3284 79.2143C18.8547 78.5927 20.4676 78.0176 22.1671 77.4889V87.7838C21.3272 87.7838 20.5218 88.1027 19.9279 88.6704C19.334 89.2381 19.0004 90.008 19.0004 90.8108V102.919H6.33346V89.4123C6.33346 86.2249 9.07902 82.5924 17.3284 79.2143ZM89.4475 62.6141C90.3215 63.5736 91.1892 64.3788 91.8384 64.9479L91.8352 65.0811V71.0201C91.0752 69.8608 90.0302 68.6499 88.5988 67.8236C87.0344 66.9245 85.2832 66.643 83.779 66.6007C82.3268 66.5765 80.8765 66.7116 79.4565 67.0032C77.9128 67.3066 76.3981 67.7319 74.928 68.2746L74.8425 68.3049L74.814 68.3139L74.8077 68.32H74.8014C74.148 68.5762 73.603 69.0339 73.253 69.6202C72.903 70.2065 72.7681 70.8879 72.8697 71.5559V71.568L72.8728 71.5952L72.8887 71.68C72.9589 72.1163 73.0434 72.5504 73.142 72.9816C73.3225 73.808 73.6138 74.9492 74.035 76.1721C74.453 77.389 75.0294 78.7693 75.8179 80.0376C76.5874 81.2848 77.6862 82.6318 79.238 83.5278C80.8023 84.4268 82.5535 84.7083 84.0577 84.7507C85.5841 84.7931 87.0978 84.5994 88.3771 84.3481C89.4807 84.1315 90.5699 83.8525 91.6389 83.5127L91.8352 83.4521V92.2093C91.0752 91.05 90.0302 89.8391 88.5988 89.0128C87.0344 88.1137 85.2832 87.8322 83.779 87.7898C82.3268 87.7657 80.8765 87.9007 79.4565 88.1924C78.0115 88.4753 76.5917 88.8649 75.2099 89.3578L75.061 89.4123L74.9249 89.4638L74.8425 89.4941L74.814 89.5062H74.8077L74.8014 89.5092C74.148 89.7654 73.603 90.2231 73.253 90.8094C72.903 91.3957 72.7681 92.077 72.8697 92.7451V92.7572L72.8728 92.7844L72.8887 92.8692C72.9589 93.3055 73.0434 93.7396 73.142 94.1708C73.3225 94.9972 73.6138 96.1384 74.035 97.3613C74.453 98.5782 75.0294 99.9585 75.8179 101.227C76.5874 102.474 77.6862 103.821 79.238 104.717C80.8023 105.616 82.5535 105.898 84.0577 105.94C85.5841 105.982 87.0978 105.789 88.3771 105.537C89.4807 105.321 90.5699 105.042 91.6389 104.702L91.8352 104.641V108.973C91.8352 109.776 92.1688 110.546 92.7627 111.113C93.3566 111.681 94.1621 112 95.0019 112C95.8418 112 96.6473 111.681 97.2412 111.113C97.835 110.546 98.1687 109.776 98.1687 108.973V105.48L98.308 105.51L98.46 105.54C99.7394 105.789 101.253 105.982 102.779 105.94C104.284 105.898 106.035 105.616 107.599 104.717C109.151 103.821 110.25 102.474 111.019 101.227C111.808 99.9555 112.381 98.5782 112.802 97.3613C113.304 95.8941 113.687 94.3923 113.949 92.8692L113.964 92.7844L113.967 92.7572V92.7421C114.068 92.0745 113.933 91.3939 113.583 90.8082C113.233 90.2225 112.689 89.7653 112.036 89.5092H112.029L112.02 89.5031L111.995 89.4941L111.912 89.4638L111.627 89.3578C110.244 88.8637 108.824 88.4731 107.378 88.1894C105.958 87.899 104.509 87.7649 103.058 87.7898C101.554 87.8322 99.8027 88.1137 98.2383 89.0128L98.1687 89.0551V84.2906L98.422 84.3421L98.46 84.3481C99.7394 84.5994 101.253 84.7931 102.779 84.7507C104.284 84.7083 106.035 84.4268 107.599 83.5278C109.151 82.6318 110.25 81.2848 111.019 80.0376C111.808 78.7663 112.381 77.389 112.802 76.1721C113.304 74.7049 113.687 73.2031 113.949 71.68L113.964 71.5952L113.967 71.568V71.5529C114.068 70.8853 113.933 70.2047 113.583 69.619C113.233 69.0333 112.689 68.5761 112.036 68.32H112.029L112.02 68.3139L111.995 68.3049L111.912 68.2746L111.627 68.1687C110.244 67.6746 108.824 67.2839 107.378 67.0002C105.958 66.7098 104.509 66.5757 103.058 66.6007C101.554 66.643 99.8027 66.9245 98.2383 67.8236L98.1687 67.866V64.9479C98.8178 64.3788 99.6824 63.5736 100.556 62.6141C101.443 61.6454 102.39 60.4558 103.131 59.1421C103.859 57.8495 104.502 56.2422 104.502 54.4865C104.502 52.7308 103.862 51.1235 103.131 49.8309C102.407 48.588 101.543 47.4239 100.556 46.3589C99.4858 45.1958 98.3233 44.113 97.0793 43.12L97.0096 43.0655L96.9875 43.0474L96.9748 43.0383C96.4142 42.6115 95.7187 42.3791 95.0019 42.3791C94.2852 42.3791 93.5897 42.6115 93.0291 43.0383H93.0227L93.0164 43.0474L92.9942 43.0655L92.9246 43.12C92.5668 43.3991 92.2183 43.6888 91.8795 43.9888C91.2209 44.5639 90.3405 45.3812 89.4475 46.3589C88.4585 47.4224 87.5951 48.5867 86.8729 49.8309C86.1446 51.1235 85.5017 52.7308 85.5017 54.4865C85.5017 56.2422 86.1414 57.8495 86.8729 59.1421C87.614 60.4558 88.564 61.6424 89.4475 62.6141ZM103.245 93.8378C102.346 93.8651 101.798 94.0285 101.503 94.1981C101.202 94.3736 100.762 94.7853 100.268 95.5784C99.7658 96.4281 99.3582 97.326 99.0522 98.2573C98.9256 98.6279 98.8084 99.0013 98.7007 99.3773C99.0237 99.458 99.3646 99.5337 99.7235 99.6043C100.718 99.795 101.715 99.9101 102.593 99.8858C103.492 99.8586 104.04 99.6951 104.334 99.5256C104.635 99.3501 105.075 98.9384 105.569 98.1453C106.072 97.2955 106.479 96.3976 106.785 95.4664C106.918 95.0789 107.036 94.7056 107.137 94.3464C106.798 94.263 106.457 94.1873 106.114 94.1193C105.172 93.9214 104.209 93.827 103.245 93.8378ZM80.7231 94.1193C80.3685 94.19 80.0275 94.2657 79.7003 94.3464C79.8016 94.7056 79.9177 95.0789 80.0486 95.4664C80.3843 96.435 80.7928 97.3734 81.2678 98.1453C81.7618 98.9414 82.202 99.3501 82.5029 99.5256C82.7974 99.6951 83.3452 99.8586 84.2446 99.8858C85.1217 99.9101 86.1193 99.795 87.1136 99.6043C87.4683 99.5337 87.8092 99.458 88.1365 99.3773C88.0298 99.0014 87.9137 98.6279 87.7881 98.2573C87.4811 97.3259 87.0725 96.428 86.5689 95.5784C86.0749 94.7823 85.6347 94.3736 85.3339 94.1981C85.0394 94.0285 84.4916 93.8651 83.5922 93.8378C82.6278 93.827 81.6652 93.9214 80.7231 94.1193ZM103.245 72.6487C102.346 72.6759 101.798 72.8394 101.503 73.0089C101.202 73.1814 100.762 73.5961 100.268 74.3892C99.7658 75.239 99.3582 76.1369 99.0522 77.0681C98.9256 77.4387 98.8084 77.8121 98.7007 78.1881C99.0237 78.2688 99.3646 78.3445 99.7235 78.4151C100.718 78.6089 101.715 78.7209 102.593 78.6966C103.492 78.6694 104.04 78.506 104.334 78.3364C104.635 78.1639 105.075 77.7492 105.569 76.9561C106.072 76.1063 106.479 75.2084 106.785 74.2772C106.918 73.8897 107.036 73.5164 107.137 73.1572C106.798 73.0738 106.457 72.9981 106.114 72.9302C105.172 72.7322 104.209 72.6378 103.245 72.6487ZM95.781 58.6335C95.5287 58.9103 95.2689 59.1808 95.0019 59.4448C94.735 59.1808 94.4752 58.9103 94.2229 58.6335C93.5426 57.9066 92.946 57.112 92.4432 56.2634C91.9872 55.4551 91.8352 54.8618 91.8352 54.4865C91.8352 54.1111 91.9872 53.5178 92.4432 52.7066C92.8897 51.9196 93.5231 51.1023 94.2229 50.3364C94.4868 50.0479 94.7465 49.7774 95.0019 49.5252C95.2553 49.7774 95.5149 50.0479 95.781 50.3364C96.4776 51.1023 97.1141 51.9196 97.5607 52.7066C98.0167 53.5178 98.1687 54.1111 98.1687 54.4865C98.1687 54.8618 98.0167 55.4551 97.5607 56.2664C97.1141 57.0534 96.4808 57.8677 95.781 58.6335ZM79.7003 73.1602C80.0233 73.0795 80.3643 73.0038 80.7231 72.9332C81.7175 72.7395 82.715 72.6275 83.5922 72.6517C84.4916 72.6789 85.0394 72.8424 85.3339 73.0119C85.6347 73.1844 86.0749 73.5991 86.5689 74.3922C87.044 75.1611 87.4525 76.0995 87.785 77.0711C87.918 77.4586 88.0351 77.8319 88.1365 78.1911C87.7974 78.2745 87.4564 78.3502 87.1136 78.4182C86.1716 78.6161 85.209 78.7106 84.2446 78.6997C83.3452 78.6724 82.7974 78.509 82.5029 78.3395C82.202 78.1669 81.7618 77.7522 81.2678 76.9591C80.7654 76.1094 80.3578 75.2115 80.0518 74.2802C79.9252 73.9096 79.808 73.5362 79.7003 73.1602Z" fill="white" />
                            </svg>


                            <h5 class="text-lg uppercase font-roboto text-white">BERKEMBANG</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Menunjukkan desa wisata yang telah stabil dan memiliki kepengurusan yang jelas</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <svg class="mb-4 mt-2" width="110" height="112" viewBox="0 0 110 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5457 41.2632C20.8413 41.2632 22.0839 41.8842 23 42.9897C23.9162 44.0952 24.4309 45.5945 24.4309 47.1579C32.1062 47.1442 39.5602 50.2601 45.5838 56H56.1847C62.6917 56 68.5442 59.4189 72.5696 64.8421H87.9384C92.5562 64.8406 97.0798 66.4186 100.985 69.3931C104.889 72.3676 108.015 76.6169 110 81.648C98.4465 100.04 79.7411 112 58.6273 112C44.9976 112 33.4685 108.445 24.1329 102.227C23.7911 103.365 23.1668 104.348 22.345 105.042C21.5232 105.736 20.5439 106.107 19.5408 106.105H4.8852C3.58956 106.105 2.34699 105.484 1.43084 104.379C0.514689 103.273 0 101.774 0 100.211V47.1579C0 45.5945 0.514689 44.0952 1.43084 42.9897C2.34699 41.8842 3.58956 41.2632 4.8852 41.2632H19.5457ZM24.4309 58.9474V88.5507L24.6507 88.7394C33.4148 96.1667 44.8412 100.211 58.6273 100.211C73.3024 100.211 86.9516 93.3962 96.9028 81.76L97.5525 80.976L96.9663 80.3865C94.6594 78.2068 91.8632 76.913 88.9399 76.6728L87.9384 76.6316H77.6209C77.9775 78.5238 78.168 80.4985 78.168 82.5263V88.4211H34.2013V76.6316L67.3718 76.6257L67.2057 76.16C66.2688 73.8005 64.8284 71.7843 63.0324 70.3185C61.2364 68.8527 59.1495 67.99 56.9858 67.8189L56.1847 67.7895H41.871C39.5998 64.9864 36.8867 62.7601 33.8915 61.2416C30.8964 59.723 27.6797 58.943 24.4309 58.9474ZM14.6605 53.0526H9.77528V94.3158H14.6605V53.0526ZM83.0532 17.6842C86.9401 17.6842 90.6679 19.5474 93.4163 22.8638C96.1648 26.1802 97.7088 30.6783 97.7088 35.3684C97.7088 40.0586 96.1648 44.5566 93.4163 47.873C90.6679 51.1895 86.9401 53.0526 83.0532 53.0526C79.1663 53.0526 75.4386 51.1895 72.6902 47.873C69.9417 44.5566 68.3977 40.0586 68.3977 35.3684C68.3977 30.6783 69.9417 26.1802 72.6902 22.8638C75.4386 19.5474 79.1663 17.6842 83.0532 17.6842ZM83.0532 29.4737C81.7576 29.4737 80.515 30.0947 79.5989 31.2002C78.6827 32.3057 78.168 33.805 78.168 35.3684C78.168 36.9318 78.6827 38.4311 79.5989 39.5366C80.515 40.6421 81.7576 41.2632 83.0532 41.2632C84.3489 41.2632 85.5915 40.6421 86.5076 39.5366C87.4238 38.4311 87.9384 36.9318 87.9384 35.3684C87.9384 33.805 87.4238 32.3057 86.5076 31.2002C85.5915 30.0947 84.3489 29.4737 83.0532 29.4737ZM48.8569 0C52.7438 0 56.4715 1.86315 59.2199 5.17959C61.9684 8.49602 63.5125 12.9941 63.5125 17.6842C63.5125 22.3744 61.9684 26.8724 59.2199 30.1888C56.4715 33.5053 52.7438 35.3684 48.8569 35.3684C44.97 35.3684 41.2422 33.5053 38.4938 30.1888C35.7453 26.8724 34.2013 22.3744 34.2013 17.6842C34.2013 12.9941 35.7453 8.49602 38.4938 5.17959C41.2422 1.86315 44.97 0 48.8569 0ZM48.8569 11.7895C47.5612 11.7895 46.3187 12.4105 45.4025 13.516C44.4864 14.6215 43.9717 16.1208 43.9717 17.6842C43.9717 19.2476 44.4864 20.7469 45.4025 21.8524C46.3187 22.9579 47.5612 23.5789 48.8569 23.5789C50.1525 23.5789 51.3951 22.9579 52.3112 21.8524C53.2274 20.7469 53.7421 19.2476 53.7421 17.6842C53.7421 16.1208 53.2274 14.6215 52.3112 13.516C51.3951 12.4105 50.1525 11.7895 48.8569 11.7895Z" fill="white" />
                            </svg>

                            <h5 class="text-lg uppercase font-roboto text-white">MAJU</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Memiliki peran aktif terhadap perkembangan ekonomi warga desa dan sekitarnya</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="flex flex-col justify-center items-center p-4 border-2 border-solid border-gray-400 rounded-md">
                        <div class="mb-2 text-center">
                            <svg class="mb-4 mt-2" width="126" height="112" viewBox="0 0 126 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M64.2993 0C59.6852 1.62473 56.0441 4.04731 53.8372 6.92804L49.8379 0.468222C47.4034 12.0202 46.4576 22.7286 58.4775 26.1181C55.5795 34.7662 53.8372 43.4189 52.8923 52.0606L47.3405 43.0839C46.5716 39.6394 44.7437 35.8971 42.6581 32.0807L37.9667 49.4339C36.019 44.1739 33.513 38.9745 30.2801 33.8726C36.8841 23.755 34.6361 17.3518 21.8853 15.3123C21.7463 16.0239 21.7341 17.4998 21.7341 17.4998L16.3678 15.4513L15.735 20.0965L13.2122 19.0068C11.7453 28.8989 13.1798 36.5524 25.8005 35.8847C26.7892 37.4401 27.7179 39.0236 28.5851 40.6325L0 33.1557C8.44068 43.7485 17.326 52.5307 30.3819 44.1809C33.3477 50.4214 35.3727 56.8098 36.7942 63.3125L19.3042 53.904C22.7795 62.3479 26.9188 69.6564 37.3763 66.1801C37.7102 67.9233 37.9988 69.6744 38.2618 71.4331H43.3581C42.6138 66.2943 41.5943 61.1743 40.1436 56.0988C42.3597 55.1401 44.018 54.0262 45.2059 52.7772C46.203 55.3986 48.3405 57.3759 52.3439 58.3008C52.0477 62.6811 51.9373 67.0599 51.9557 71.4326H57.0012C56.9975 70.4798 57.0004 69.5316 57.0093 68.5795C68.3187 66.9845 67.6685 58.6349 65.7589 49.5725L57.1281 63.5313C57.3347 57.9829 57.8009 52.4518 58.6382 46.9315C72.8167 48.1121 75.1464 37.852 76.2213 26.3812L59.5332 41.7958C60.4701 36.9818 61.7093 32.1762 63.313 27.383C73.4495 28.459 84.0709 19.01 83.6379 10.9952L80.2797 12.8026C79.9954 10.0026 78.4778 6.83042 75.6562 3.27661C73.6218 4.53004 71.8755 6.22009 70.2988 8.06184L69.1929 3.82584L66.0372 7.24269C65.9509 4.79155 65.4514 2.38044 64.2993 0ZM113.497 23.2355C112.148 23.2374 110.532 23.4368 108.569 23.9158C104.969 24.7947 101.139 26.7837 102.528 32.7242C95.9167 35.7974 90.2685 40.0102 85.7214 45.1684H85.6701C85.6782 45.1789 85.6882 45.1871 85.6957 45.1977C85.4797 45.4435 85.2656 45.687 85.0545 45.9365L91.2813 28.0636C78.8785 35.4949 68.6183 43.3194 79.0135 54.9278C76.3973 59.9134 74.5489 65.4487 73.5292 71.4326H83.7974C90.4203 69.7058 91.7891 62.9025 92.4876 55.4545L79.4862 67.4602C81.313 60.3081 84.4605 54.0609 88.7755 48.8554C98.6914 58.722 109.613 52.3432 120.643 44.2177L92.4039 44.9856C95.9391 41.6415 100.058 38.8523 104.705 36.6746C107.779 40.1254 112.373 39.9924 115.665 38.5035C122.506 35.4095 120.374 31.9859 126 27.7564C120.359 28.9888 120.775 23.225 113.497 23.2355ZM33.402 75.8079L40.4304 112H79.199L86.3288 75.8079H33.402Z" fill="white" />
                            </svg>

                            <h5 class="text-lg uppercase font-roboto text-white">MANDIRI</h5>
                        </div>
                        <div class="text-center">
                            <p class="text-md font-poppins text-white" style="line-height: 2.0;">Klasifikasi ketika desa wisata sudah memiliki pengunjung dari lingkup yang lebih luas</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection
