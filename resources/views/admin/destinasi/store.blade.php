@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Destinasi')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="createDestinasiForm" action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Kategori Destinasi --}}
            <div class="form-group">
                <label for="exampleSelectRounded0">Kategori Destinasi</label>
                <select class="custom-select rounded-0" name="idKategoriWisata" id="exampleSelectRounded0">
                    <option value="1">Wisata Alam</option>
                    <option value="2">Wisata Budaya</option>
                    <option value="3">Wisata Kreatif</option>
                </select>
            </div>

            {{-- Nama Destinasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaDestinasi">Nama Destinasi</label>
            <div id="namaObjekWisata-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaObjekWisata" class="form-control" id="namaObjekWisata" placeholder="Masukkan Nama Destinasi " autocomplete="off">
            </div>
            <div id="namaObjekWisata-error" style="color: red; display: none;">Maksimal Input Nama Destinasi Adalah 255 karakter</div>

            {{-- Alamat Destinasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="alamatDestinasi">Alamat Destinasi</label>
            <div id="lokasi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Alamat" autocomplete="off">
            </div>
            <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Alamat Destinasi Adalah 255 karakter</div>

            {{-- Jam Buka --}}
            <div class="form-group">
                <div class="flex">
                    <label for="jamBuka">Jam Buka</label>
                    <div id="jamBuka-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>

                </div>
                <input type="time" name="jamBuka" class="form-control" id="jamBuka" placeholder="Waktu Buka Destinasi" autocomplete="off">
            </div>

            {{-- Jam Tutup --}}
            <div class="form-group">
                <div class="flex">
                    <label for="jamTutup">Jam Tutup</label>
                    <div id="jamTutup-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="time" name="jamTutup" class="form-control" id="jamTutup" placeholder="Waktu Tutup Destinasi" autocomplete="off">
            </div>

            {{-- Waktu Operasi --}}
            <div class="flex">
            <label for="waktuOperasi">Waktu Operasi</label><br>
            <div id="waktuOperasi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                
            </div>
            <div class="input-group">
                <input type="text" name="waktuOperasi" id="waktuOperasi" class="form-control" autocomplete="off">
            </div>
            <div id="waktuOperasi-error" style="color: red; display: none;">Maksimal Input Waktu Operasi Adalah 255 karakter</div>

            {{-- Kontak Destinasi --}}
            <div class="flex">
            <label for="kontakDestinasi">Kontak Destinasi</label><br>
            <div id="kontakDestinasi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="number" name="kontak" id="kontakDestinasi" class="form-control">
            </div>
            <span id="kontakError" class="text-danger font-semibold text-sm"></span>

            {{-- Gambar Objek Wisata --}}
            <div class="form-group">
                <label>Gambar Objek Wisata</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Cari Gambar <input type="file" name="gambar" id="imgInp" accept="image/*">
                        </span>
                    </span>
                    <input type="text" name="gambar-text" class="form-control" readonly>
                </div>
                <span id="gambarError" class="text-danger font-semibold text-sm"></span>
                <div id="gambar-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>
                <img id='img-upload' style="width: 400px;" class="mx-auto">
            </div>

            {{-- Deskripsi --}}
            <div class="form-group">
                <label for="deskripsiDestinasi">Deskripsi</label>
                <textarea class="summernote deskripsiDestinasi w-full" name="deskripsi" id="deskripsiDestinasi" rows="4" placeholder="Masukkan Deskripsi Menarik Tentang Destinasi Wisata"></textarea>
            </div>
            <div id="deskripsiDestinasi-empty-error" class="font-semibold ml-2 text-red-500" style=" display: none;">*Bidang ini harus diisi!</div>

            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('AdminDestinationView') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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

            $('#kontakDestinasi').on('input', function() {
                var kontak = $(this).val();
                var kontakError = $('#kontakError');

                if (kontak.length < 11 || kontak.length > 13) {
                    kontakError.text('Kontak harus terdiri dari 11 hingga 13 digit.');
                } else {
                    kontakError.text('');
                }
            });

            // Lokasi
            $('#lokasi').on('input', function() {
                var lokasiInput = $(this);
                var lokasiError = $('#lokasi-error');

                if (lokasiInput.val().length > 255) {
                    lokasiInput.val(lokasiInput.val().substring(0, 255)); // Truncate the input to 255 characters
                    lokasiError.show();
                } else {
                    lokasiError.hide();
                }
            });

            // Nama Objek Wisata
            $('#namaObjekWisata').on('input', function() {
                var namaObjekWisataInput = $(this);
                var namaObjekWisataError = $('#namaObjekWisata-error');

                if (namaObjekWisataInput.val().length > 255) {
                    namaObjekWisataInput.val(namaObjekWisataInput.val().substring(0, 255)); // Truncate the input to 255 characters
                    namaObjekWisataError.show();
                } else {
                    namaObjekWisataError.hide();
                }
            });

            // Waktu Operasi
            $('#waktuOperasi').on('input', function() {
                var waktuOperasiInput = $(this);
                var waktuOperasiError = $('#waktuOperasi-error');

                if (waktuOperasiInput.val().length > 255) {
                    waktuOperasiInput.val(waktuOperasiInput.val().substring(0, 255)); // Truncate the input to 255 characters
                    waktuOperasiError.show();
                } else {
                    waktuOperasiError.hide();
                }
            });

            // Form Validation
            $('#createDestinasiForm').on('submit', function(event) {
                const namaObjekWisata = $('#namaObjekWisata').val().trim();
                const lokasi = $('#lokasi').val().trim();
                const jamBuka = $('#jamBuka').val().trim();
                const jamTutup = $('#jamTutup').val().trim();
                const waktuOperasi = $('#waktuOperasi').val().trim();
                const deskripsiDestinasi = $('#deskripsiDestinasi').val().trim();
                const kontak = $('#kontakDestinasi').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;

                // Nama Objek Wisata validation
                if (namaObjekWisata === '') {
                    $('#namaObjekWisata-empty-error').show();
                    isValid = false;
                    $('#namaObjekWisata').focus();

                } else {
                    $('#namaObjekWisata-empty-error').hide();
                }

                // Lokasi validation
                if (lokasi === '') {
                    $('#lokasi-empty-error').show();
                    isValid = false;
                    $('#lokasi').focus();
                } else {
                    $('#lokasi-empty-error').hide();
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

                // Waktu Operasi validation
                if (waktuOperasi === '') {
                    $('#waktuOperasi-empty-error').show();
                    isValid = false;
                } else {
                    $('#waktuOperasi-empty-error').hide();
                }

                 // Validate each field
            if (kontak === '') {
                $('#kontakDestinasi-empty-error').show();
                isValid = false;
                $('#kontakDestinasi').focus();
            } else {
                $('#kontakDestinasi-empty-error').hide();
            }

                // Deskripsi validation
                if (deskripsiDestinasi === '') {
                    $('#deskripsiDestinasi-empty-error').show();
                    isValid = false;
                } else {
                    $('#deskripsiDestinasi-empty-error').hide();
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
        $('#deskripsiDestinasi').summernote({
            placeholder: 'Masukkan Deskripsi Objek Wisata'
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
