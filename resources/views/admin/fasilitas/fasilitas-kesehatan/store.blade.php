@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Fasilitas Kesehatan')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="fasilitasKesehatanForm" action="{{ route('fasilitas-kesehatan.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Nama Fasilitas Kesehatan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaFasilitasKesehatan">Nama Fasilitas Kesehatan</label>
                    <div id="namaFasilitasKesehatan-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="namaFasilitasKesehatan" class="form-control" id="namaFasilitasKesehatan" placeholder="Masukkan Nama Fasilitas Kesehatan " autocomplete="off">
            </div>
            <div id="namaFasilitasKesehatan-error" style="color: red; display: none;">Maksimal Input Nama Fasilitas Kesehatan Adalah 255 Karakter!</div>

            {{-- Lokasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="lokasi">Lokasi</label>
                    <div id="lokasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Fasilitas Kesehatan" autocomplete="off">
            </div>
            <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Lokasi Adalah 255 Karakter!</div>

            {{-- Deskripsi Singkat Fasilitas Kesehatan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Singkat Fasilitas Kesehatan</label>
                    <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <textarea class="deskripsi w-full" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Tentang Fasilitas Kesehatan"></textarea>
            </div>
            <div id="deskripsi-error" style="color: red; display: none;">Maksimal Input Deskripsi Adalah 255 Karakter!</div>

            {{-- Jadwal Operasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="waktuOperasi">Jadwal Operasi</label>
                    <div id="waktuOperasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="waktuOperasi" class="form-control" id="waktuOperasi" placeholder="Masukkan Jadwal Operasi Fasilitas Kesehatan" autocomplete="off">
            </div>
            <div id="waktuOperasi-error" style="color: red; display: none;">Maksimal Input Jadwal Operasi Adalah 255 Karakter!</div>

            {{-- Jam Buka --}}
            <div class="form-group">
                <div class="flex">
                    <label for="jamBuka">Jam Buka</label>
                    <div id="jamBuka-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="time" name="jamBuka" class="form-control" id="jamBuka" placeholder="Waktu Buka Destinasi" autocomplete="off">
            </div>

            {{-- Jam Tutup --}}
            <div class="form-group">
                <div class="flex">
                    <label for="jamTutup">Jam Tutup</label>
                    <div id="jamTutup-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="time" name="jamTutup" class="form-control" id="jamTutup" placeholder="Waktu Tutup Destinasi" autocomplete="off">
            </div>

            {{-- Konten --}}
            <div class="form-group">
                <div class="flex">
                    <label for="isiKonten">Konten</label>
                    <div id="isiKonten-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <textarea class="summernote w-full" name="isiKonten" id="isiKonten" rows="4"></textarea>
            </div>

            {{-- Gambar Fasilitas Kesehatan --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Fasilitas Kesehatan</label>
                    <div id="gambar-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

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
                <a href="{{ route('fasilitas-kesehatan.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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
                } else if (file.size > 2040 * 1024) { // 2040 KB in bytes
                    imgError.text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                    this.value = ''; // Clear the input
                } else {
                    imgError.text('');
                    readURL(this);
                }
            });

            // Form Validation
            $('#fasilitasKesehatanForm').on('submit', function(event) {
                var file = $('#imgInp')[0].files[0];
                var imgError = $('#gambarError');

                if (file) {
                    var validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validImageTypes.includes(file.type)) {
                        event.preventDefault();
                        imgError.text('Format gambar harus berupa jpeg, jpg, png, atau gif.');
                    } else if (file.size > 2040 * 1024) { // 2040 KB in bytes
                        event.preventDefault();
                        imgError.text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                    } else {
                        imgError.text('');
                    }
                }
            });

            var textarea = $('#deskripsi');
            textarea.height(textarea[0].scrollHeight + 'px');
            textarea.on('input', function() {
                $(this).height(0);
                $(this).height(this.scrollHeight + 'px');
            });

            // lokasi singkat
            $('#lokasi').on('input', function() {
                var lokasiInput = $(this);
                var lokasiErrorDiv = $('#lokasi-error');

                if (lokasiInput.val().length > 255) {
                    lokasiInput.val(lokasiInput.val().substring(0, 255));
                    lokasiErrorDiv.show();
                } else {
                    lokasiErrorDiv.hide();
                }
            });

            // nama bank
            $('#namaFasilitasKesehatan').on('input', function() {
                var namaFasilitasKesehatanInput = $(this);
                var namaFasilitasKesehatanErrorDiv = $('#namaFasilitasKesehatan-error');

                if (namaFasilitasKesehatanInput.val().length > 255) {
                    namaFasilitasKesehatanInput.val(namaFasilitasKesehatanInput.val().substring(0, 255));
                    namaFasilitasKesehatanErrorDiv.show();
                } else {
                    namaBankErrorDiv.hide();
                }
            });

            // waktu operasi
            $('#waktuOperasi').on('input', function() {
                var waktuOperasiInput = $(this);
                var waktuOperasiErrorDiv = $('#waktuOperasi-error');

                if (waktuOperasiInput.val().length > 255) {
                    waktuOperasiInput.val(waktuOperasiInput.val().substring(0, 255));
                    waktuOperasiErrorDiv.show();
                } else {
                    waktuOperasiErrorDiv.hide();
                }
            });

            // deskripsi
            $('#deskripsi').on('input', function() {
                var deskripsiInput = $(this);
                var deskripsiErrorDiv = $('#deskripsi-error');

                if (deskripsiInput.val().length > 255) {
                    deskripsiInput.val(deskripsiInput.val().substring(0, 255));
                    deskripsiErrorDiv.show();
                } else {
                    deskripsiErrorDiv.hide();
                }
            });

            $('#fasilitasKesehatanForm').on('submit', function(event) {
                const namaFasilitasKesehatan = $('#namaFasilitasKesehatan').val().trim();
                const lokasi = $('#lokasi').val().trim();
                const deskripsi = $('#deskripsi').val().trim();
                const waktuOperasi = $('#waktuOperasi').val().trim();
                const jamBuka = $('#jamBuka').val().trim();
                const jamTutup = $('#jamTutup').val().trim();
                const isiKonten = $('#isiKonten').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;

                // Validate each field
                if (namaFasilitasKesehatan === '') {
                    $('#namaFasilitasKesehatan-empty-error').show();
                    isValid = false;
                    $('#namaFasilitasKesehatan').focus();
                } else {
                    $('#namaFasilitasKesehatan-empty-error').hide();
                }

                if (lokasi === '') {
                    $('#lokasi-empty-error').show();
                    isValid = false;
                    $('#lokasi').focus();
                } else {
                    $('#lokasi-empty-error').hide();
                }

                if (deskripsi === '') {
                    $('#deskripsi-empty-error').show();
                    isValid = false;
                    $('#deskripsi').focus();
                } else {
                    $('#deskripsi-empty-error').hide();
                }

                if (waktuOperasi === '') {
                    $('#waktuOperasi-empty-error').show();
                    isValid = false;
                    $('#waktuOperasi').focus();
                } else {
                    $('#waktuOperasi-empty-error').hide();
                }

                if (jamBuka === '') {
                    $('#jamBuka-empty-error').show();
                    isValid = false;
                    $('#jamBuka').focus();
                } else {
                    $('#jamBuka-empty-error').hide();
                }

                if (jamTutup === '') {
                    $('#jamTutup-empty-error').show();
                    isValid = false;
                    $('#jamTutup').focus();
                } else {
                    $('#jamTutup-empty-error').hide();
                }

                if (isiKonten === '') {
                    $('#isiKonten-empty-error').show();
                    isValid = false;
                    $('#isiKonten').focus();
                } else {
                    $('#isiKonten-empty-error').hide();
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


        $('#isiKonten').summernote({
            placeholder: 'Masukkan Isi Konten Fasilitas Kesehatan'
            , tabsize: 2
            , toolbar: [
                ['style', ['style']]
                , ['font', ['bold', 'underline', 'clear']]
                , ['color', ['color']]
                , ['para', ['ul', 'ol', 'paragraph']],
                //   ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                //   ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>
    @endsection
