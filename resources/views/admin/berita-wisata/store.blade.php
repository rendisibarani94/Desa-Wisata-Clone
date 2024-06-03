@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Berita Wisata')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="createBeritaWisataForm" action="{{ route('berita-wisata.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- {{ Auth::user()->id }} --}}
            <input type="text" name="penulis" class="form-control" id="penulis" value="1" hidden>
            {{-- Judul Berita --}}
            <div class="form-group">
                <div class="flex">
                    <label for="judulBerita">Judul Berita</label>
            <div id="judulBerita-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                
                </div>
                <input type="text" name="judulBerita" class="form-control" id="judulBerita" placeholder="Masukkan Nama Destinasi" autocomplete="off">
            </div>
            <div id="judulBerita-error" class="font-semibold" style="color: red; display: none;">Maksimal Input Judul Berita Adalah 255 Karakter!</div>

            {{-- Tanggal Berita --}}
            <div class="form-group mt-4">
                <div class="flex">
                    <label for="tanggalBerita">Tanggal Berita</label>
            <div id="date-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                
                </div>
                <input type="date" name="tanggalBerita" class="form-control" id="tanggalBerita" placeholder="Masukkan Alamat" autocomplete="off">
            </div>


            {{-- Deskripsi --}}
            <div class="form-group mt-4">
                <div class="flex">
                    <label for="deskripsiBeritaWisata">Deskripsi</label>
            <div id="deskripsiBeritaWisata-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                
                </div>
                <textarea class="deskripsiBeritaWisata w-full" name="deskripsi" id="deskripsiBeritaWisata" rows="4" placeholder="Masukkan Deskripsi Menarik Tentang Berita Wisata"></textarea>
            </div>


            {{-- Isi Berita --}}
            <div class="form-group mt-4">
                <div class="flex">
                    <label for="isiBerita">Isi Berita</label>
            <div id="isiBerita-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                
                </div>
                <textarea class="summernote w-full" name="isiBerita" id="isiBerita" rows="4"></textarea>
            </div>

            {{-- Gambar Objek Wisata --}}
            <div class="form-group mt-4">
                <div class="flex">
                    <label>Gambar Objek Wisata</label>
                    <div id="gambar-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Cari Gambar <input type="file" name="gambar" id="imgInp" accept="image/*">
                        </span>
                    </span>
                    <input type="text" name="gambar-text" class="form-control" readonly>
                </div>
                <span id="gambarError" class="text-danger font-semibold text-sm"></span>
                <img id='img-upload' style="width: 400px;" class="mx-auto">
            </div>

            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('berita-wisata.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded ml-auto">Tambahkan</button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
    @endsection

    @section('js')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this)
                    , label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                var input = $(this).parents('.input-group').find(':text')
                    , log = label;
                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                var file = this.files[0];
                var imgError = $('#gambarError');
                var validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

                if (!validImageTypes.includes(file.type)) {
                    imgError.text('Format gambar harus berupa jpeg, jpg, png, atau gif.');
                    this.value = ''; // Clear the input
                } else if (file.size > 2048 * 1024) { // 2048 KB in bytes
                    imgError.text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                    this.value = ''; // Clear the input
                } else {
                    imgError.text('');
                    readURL(this);
                }
            });

            // Character length restriction for Judul Berita
            $('#judulBerita').on('input', function() {
                var judulBeritaInput = $(this);
                var judulBeritaError = $('#judulBerita-error');

                if (judulBeritaInput.val().length > 255) {
                    judulBeritaInput.val(judulBeritaInput.val().substring(0, 255)); //Truncate the input to 255 characters
                    judulBeritaError.show();
                } else {
                    judulBeritaError.hide();
                }
            });

            // Form Validation
            $('#createBeritaWisataForm').on('submit', function(event) {
                // input elements
                const judulBeritaInput = document.getElementById('judulBerita');
                const tanggalBeritaInput = document.getElementById('tanggalBerita');
                const deskripsiInput = document.getElementById('deskripsiBeritaWisata');
                const isiBeritaInput = document.getElementById('isiBerita');
                const gambarInput = document.getElementById('imgInp');

                // Error input elements
                const judulBeritaEmptyError = document.getElementById('judulBerita-empty-error');
                const judulBeritaError = document.getElementById('judulBerita-error');
                const tanggalBeritaEmptyError = document.getElementById('date-empty-error');
                const deskripsiEmptyError = document.getElementById('deskripsiBeritaWisata-empty-error');
                const isiBeritaEmptyError = document.getElementById('isiBerita-empty-error');
                const gambarEmptyError = document.getElementById('gambar-empty-error');
                const file = $('#imgInp')[0].files.length;

                // Flag to track validation status
                let isValid = true;

                // Validate Judul Berita
                if (judulBeritaInput.value.trim() === '') {
                    judulBeritaEmptyError.style.display = 'block';
                    isValid = false;
                    judulBeritaInput.focus();
                    
                } else {
                    judulBeritaEmptyError.style.display = 'none';
                }

                // Validate Tanggal Berita
                if (tanggalBeritaInput.value.trim() === '') {
                    tanggalBeritaEmptyError.style.display = 'block';
                    isValid = false;
                    tanggalBeritaInput.focus();
                } else {
                    tanggalBeritaEmptyError.style.display = 'none';
                }

                // Validate Deskripsi
                if (deskripsiInput.value.trim() === '') {
                    deskripsiEmptyError.style.display = 'block';
                    isValid = false;
                    deskripsiInput.focus();
                } else {
                    deskripsiEmptyError.style.display = 'none';
                }

                // Validate Isi Berita
                if (isiBeritaInput.value.trim() === '') {
                    isiBeritaEmptyError.style.display = 'block';
                    isValid = false;
                    isiBeritaInput.focus();
                } else {
                    isiBeritaEmptyError.style.display = 'none';
                }

                if (!file && !$('#img-upload').attr('src')) {
                $('#gambar-empty-error').show();
                isValid = false;
                $('#gambar').focus();
            } else {
                $('#gambar-empty-error').hide();
            }

                // Prevent form submission if validation fails
                if (!isValid) {
                    event.preventDefault();
                }
            });


            var textarea = $('#deskripsiBeritaWisata');
            textarea.height(textarea[0].scrollHeight + 'px');

            textarea.on('input', function() {
                $(this).height(0);
                $(this).height(this.scrollHeight + 'px');
            });


        });

        $('#isiBerita').summernote({
            placeholder: 'Masukkan Isi Konten Berita Wisata'
            , tabsize: 2
            , toolbar: [
                ['style', ['style']]
                , ['font', ['bold', 'underline', 'clear']]
                , ['color', ['color']]
                , ['para', ['ul', 'ol', 'paragraph']]
            , ]
        });

    </script>

    @endsection
