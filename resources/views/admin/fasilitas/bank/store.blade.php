@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Bank')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="createBankForm" action="{{ route('admin.bank.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="card-body">
            {{-- Nama Fasilitas Bank --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaBank">Nama Fasilitas Bank</label>
                    <div id="namaBank-empty-error" class="font-semibold ml-2 text-red-500" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="namaBank" class="form-control" id="namaBank" placeholder="Masukkan Nama Fasilitas Bank" autocomplete="off">
            </div>
            <div id="namaBank-error" style="color: red; display: none;">Maksimal Input Nama Bank Adalah 255 Karakter!</div>

            {{-- Lokasi Fasilitas Bank--}}
            <div class="form-group">
                <div class="flex">
                    <label for="lokasi">Lokasi Fasilitas Bank</label>
                    <div id="lokasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Fasilitas Bank" autocomplete="off">
            </div>
            <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Lokasi Adalah 255 Karakter!</div>

            {{-- Deskripsi Fasilitas Bank --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Fasilitas Bank</label>
                    <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <textarea class="deskripsi w-full" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Tentang Fasilitas Bank"></textarea>
            </div>
            <div id="deskripsi-error" style="color: red; display: none;">Maksimal Input Deskripsi Adalah 255 Karakter!</div>

            {{-- Jadwal Operasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="waktuOperasi">Jadwal Operasi</label>
                    <div id="waktuOperasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="text" name="waktuOperasi" class="form-control" id="waktuOperasi" placeholder="Masukkan Jadwal Operasi Fasilitas Bank" autocomplete="off">
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

            {{-- Gambar Fasilitas Bank --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Fasilitas Bank</label>
                    <div id="gambar-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">Cari Gambar <input type="file" name="gambar" id="imgInp" accept="image/*"></span>
                    </span>
                    <input type="text" name="gambar-text" class="form-control" readonly>
                </div>
                <span id="gambarError" class="text-danger font-semibold text-sm"></span>
                <img id='img-upload' style="width: 400px;" class="mx-auto">
            </div>

            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('admin.bank.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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

            // Form Validation
            $('#createBankForm').on('submit', function(event) {
                var file = $('#imgInp')[0].files[0];
                var imgError = $('#gambarError');

                if (file) {
                    var validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validImageTypes.includes(file.type)) {
                        event.preventDefault();
                        imgError.text('Format gambar harus berupa jpeg, jpg, png, atau gif.');
                    } else if (file.size > 2048 * 1024) { // 2048 KB in bytes
                        event.preventDefault();
                        imgError.text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                    } else {
                        imgError.text('');
                    }
                }
            });

            var textarea = $('#deskripsi');

            // Set the initial height of the textarea based on its content
            textarea.height(textarea[0].scrollHeight + 'px');

            // Bind the input event handler to the textarea
            textarea.on('input', function() {
                // Set the height of the textarea based on its content
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
            $('#namaBank').on('input', function() {
                var namaBankInput = $(this);
                var namaBankErrorDiv = $('#namaBank-error');

                if (namaBankInput.val().length > 255) {
                    namaBankInput.val(namaBankInput.val().substring(0, 255));
                    namaBankErrorDiv.show();
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

            $('#createBankForm').on('submit', function(event) {
                const namaBank = $('#namaBank').val().trim();
                const lokasi = $('#lokasi').val().trim();
                const deskripsi = $('#deskripsi').val().trim();
                const waktuOperasi = $('#waktuOperasi').val().trim();
                const jamBuka = $('#jamBuka').val().trim();
                const jamTutup = $('#jamTutup').val().trim();
                const isiKonten = $('#isiKonten').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;

                // Validate each field
                if (namaBank === '') {
                    $('#namaBank-empty-error').show();
                    isValid = false;
                    $('#namaBank').focus();
                } else {
                    $('#namaBank-empty-error').hide();
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
            placeholder: 'Masukkan Isi Konten Bank'
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