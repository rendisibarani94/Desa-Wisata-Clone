@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Atraksi Wisata')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="createAtraksiWisataForm" action="{{ route('atraksi-wisata.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Nama Atraksi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaAtraksi">Nama Atraksi</label>
                    <div id="namaAtraksi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                </div>
                <input type="text" name="namaAtraksi" class="form-control" id="namaAtraksi" placeholder="Masukkan Nama Atraksi" autocomplete="off">
            </div>
            <div id="namaAtraksi-error" style="color: red; display: none;">Maksimal Input Nama Atraksi Adalah 255 Karakter</div>

            {{-- Deskripsi Singkat Atraksi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsiSingkat">Deskripsi Singkat Atraksi</label>
                    <div id="deskripsiSingkat-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                </div>
                <textarea class="deskripsiSingkat w-full" name="deskripsiSingkat" id="deskripsiSingkat" rows="4" placeholder="Masukkan Deskripsi Menarik Tentang Atraksi Wisata"></textarea>
            </div>
            <div id="deskripsiSingkat-error" style="color: red; display: none;">Maksimal Input Deskripsi Singkat Adalah 255 Karakter</div>
       

            {{-- Tarif Atraksi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="tarif">Tarif Atraksi</label>
                    <div id="tarif-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>
                </div>
                <input type="number" name="tarif" class="form-control" id="tarif" placeholder="Masukkan Tarif Atraksi" autocomplete="off" min="0">
            </div>

            {{-- Lokasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="lokasi">Lokasi</label>
                    <div id="lokasi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>

                </div>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Atraksi" autocomplete="off">
            </div>
            <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Lokasi Atraksi Adalah 255 Karakter</div>

            {{-- Isi Atraksi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="isiAtraksi">Isi Atraksi</label>
                    <div id="isiAtraksi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang Ini Harus Di Isi!</div>

                </div>
                <textarea class="summernote w-full" name="isiAtraksi" id="isiAtraksi" rows="4"></textarea>
            </div>

            {{-- Gambar Atraksi Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Atraksi Wisata</label>
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
                <a href="{{ route('atraksi-wisata.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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

            $('#namaAtraksi').on('input', function() {
                var input = $(this);
                var error = $('#namaAtraksi-error');
                if (input.val().length > 255) {
                    input.val(input.val().substring(0, 255));
                    error.show();
                } else {
                    error.hide();
                }
            });

            $('#deskripsiSingkat').on('input', function() {
                var input = $(this);
                var error = $('#deskripsiSingkat-error');
                if (input.val().length > 255) {
                    input.val(input.val().substring(0, 255));
                    error.show();
                } else {
                    error.hide();
                }
            });

            $('#lokasi').on('input', function() {
                var input = $(this);
                var error = $('#lokasi-error');
                if (input.val().length > 255) {
                    input.val(input.val().substring(0, 255));
                    error.show();
                } else {
                    error.hide();
                }
            });

            $('#createAtraksiWisataForm').on('submit', function(event) {
                const namaAtraksi = $('#namaAtraksi').val().trim();
                const deskripsiSingkat = $('#deskripsiSingkat').val().trim();
                const tarif = $('#tarif').val().trim();
                const lokasi = $('#lokasi').val().trim();
                const isiAtraksi = $('#isiAtraksi').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;

                if (namaAtraksi === '') {
                    $('#namaAtraksi-empty-error').show();
                    isValid = false;
                    $('#namaAtraksi').focus();
                } else {
                    $('#namaAtraksi-empty-error').hide();
                }

                if (deskripsiSingkat === '') {
                    $('#deskripsiSingkat-empty-error').show();
                    isValid = false;
                    $('#deskripsiSingkat').focus();
                } else {
                    $('#deskripsiSingkat-empty-error').hide();
                }

                if (tarif === '') {
                    $('#tarif-empty-error').show();
                    isValid = false;
                    $('#tarif').focus();
                } else {
                    $('#tarif-empty-error').hide();
                }

                if (lokasi === '') {
                    $('#lokasi-empty-error').show();
                    isValid = false;
                    $('#lokasi').focus();
                } else {
                    $('#lokasi-empty-error').hide();
                }

                if (isiAtraksi === '') {
                    $('#isiAtraksi-empty-error').show();
                    isValid = false;
                    $('#isiAtraksi').focus();
                } else {
                    $('#isiAtraksi-empty-error').hide();
                }

                // Gambar validation (only if no existing image)
                if (!file && !$('#img-upload').attr('src')) {
                    $('#gambar-empty-error').show();
                    isValid = false;
                    $('#gambar').focus();
                } else {
                    $('#gambar-empty-error').hide();
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });

    </script>
    @endsection
