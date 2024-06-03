@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Paket Wisata')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.paketWisata.create') }}" method="POST" enctype="multipart/form-data" id="paketWisataFormStore">
        @csrf
        @method("POST")
        <div class="card-body">
            {{-- Nama Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaPaket">Nama Paket Wisata</label>
            <div id="namaPaket-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaPaket" class="form-control" id="namaPaket" placeholder="Masukkan Nama Paket Wisata " autocomplete="off">
                <div id="namaPaket-error" style="color: red; display: none;">Maksimal Input Nama Paket Adalah 255 Karakter!</div>
            </div>

            {{-- Harga Paket Wisata--}}
            <div class="form-group">
                <div class="flex">
                    <label for="harga">Harga Paket Wisata</label>
            <div id="harga-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Paket Wisata" autocomplete="off" min="0">
            </div>

            {{-- Durasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="durasi">Durasi Pelaksanaan Paket Wisata </label>
            <div id="durasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Masukkan Durasi Pelaksanaan " autocomplete="off">
                <div id="durasi-error" style="color: red; display: none;">Maksimal Input Durasi Adalah 255 Karakter!</div>
            </div>

            {{-- Lokasi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="lokasi">Lokasi</label>
            <div id="lokasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi" autocomplete="off">
                <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Lokasi Adalah 255 Karakter!</div>
            </div>

            {{-- Tersedia --}}
            <div class="form-group">
                <div class="flex">
                    <label for="waktuTersedia">Tempo Paket Wisata Tersedia / Dilaksanakan</label>
            <div id="waktuTersedia-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="waktuTersedia" class="form-control" id="waktuTersedia" placeholder="Masukkan Data " autocomplete="off">
                <div id="waktuTersedia-error" style="color: red; display: none;">Maksimal Input Tempo Paket Wisata Adalah 255 Karakter!</div>
            </div>

            {{-- Deskripsi Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Paket Wisata</label>
            <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="deskripsi" id="deskripsi" rows="4"></textarea>
            </div>

            {{-- Rute Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="rute">Rute Paket Wisata</label>
            <div id="rute-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="rute" id="rute" rows="4"></textarea>
            </div>

            {{-- Akomodasi Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="akomodasi">Akomodasi Paket Wisata</label>
            <div id="akomodasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="akomodasi" id="akomodasi" rows="4"></textarea>
            </div>

            {{-- Syarat & Ketentuan Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="syaratKetentuan">Syarat & Ketentuan Paket Wisata</label>
            <div id="syaratKetentuan-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="syaratKetentuan" id="syaratKetentuan" rows="4"></textarea>
            </div>

            {{-- Nama Kontak Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaKontak">Nama Kontak Paket Wisata</label>
            <div id="namaKontak-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaKontak" class="form-control" id="namaKontak" placeholder="Masukkan Kontak Paket Wisata" autocomplete="off">
                <div id="namaKontak-error" style="color: red; display: none;">Maksimal Input Nama Kontak Adalah 100 Karakter!</div>
            </div>

            {{-- Kontak Paket Wisata --}}
            <div class="form-group">
                <div class="flex">
                    <label for="kontak">Kontak Paket Wisata</label>
            <div id="kontak-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="kontak" class="form-control" id="kontak" placeholder="Masukkan Kontak Paket Wisata" autocomplete="off">
                <small id="kontakHelp" class="form-text text-muted">Contoh: +6281234567890 atau 081234567890</small>
                <span id="kontakError" class="text-danger font-semibold text-sm"></span>
            </div>

            @for($i = 1; $i <= 5; $i++) <div class="form-group">
                <div class="flex">
                    <label>Gambar {{ $i }} Paket Wisata</label>
                    <div id="gambar-empty-error{{ $i }}" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Cari Gambar <input type="file" name="gambar{{ $i }}" id="imgInp{{ $i }}" accept="image/*">
                        </span>
                    </span>
                    <input type="text" name="gambar-text{{ $i }}" class="form-control" readonly>
                </div>
                <span id="gambarError{{ $i }}" class="text-danger font-semibold text-sm"></span>
                <img id='img-upload{{ $i }}' style="width: 400px;" class="mx-auto">
        </div>
        @endfor

        {{-- Button Submit --}}
        <div class="card-footer flex justify-between">
            <a href="{{ route('admin.paketWisata.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded ml-auto">Tambahkan</button>
        </div>
</div>
</form>
<!-- /.card-body -->
@endsection

@section('js')
<script>
    $(document).ready(function() {
        function validateImage(input, errorElement) {
            const file = input.files[0];
            const fileType = file.type.split('/')[0];
            const fileSize = file.size;
            const maxSize = 2 * 1024 * 1024; // 2MB
            const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

            if (!validImageTypes.includes(file.type)) {
                $(errorElement).text('Format gambar harus berupa jpeg, jpg, png, atau gif.');
                input.value = '';
                return false;
            } else if (fileSize > maxSize) {
                $(errorElement).text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                input.value = '';
                return false;
            }

            $(errorElement).text('');
            return true;
        }

        @for($i = 1; $i <= 5; $i++)
        $("#imgInp{{ $i }}").change(function() {
            const isValid = validateImage(this, '#gambarError{{ $i }}');
            if (isValid) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-upload{{ $i }}').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        @endfor

        $('#kontak').on('input', function() {
            var kontak = $(this).val();
            var kontakError = $('#kontakError');

            if (kontak.length < 11 || kontak.length > 13) {
                kontakError.text('Kontak harus terdiri dari 11 hingga 13 digit.');
            } else {
                kontakError.text('');
            }
        });

        $('#paketWisataFormStore').on('submit', function(event) {
            var kontak = $('#kontak').val();
            var kontakError = $('#kontakError');

            if (kontak.length < 11 || kontak.length > 13) {
                event.preventDefault();
                kontakError.text('Kontak harus terdiri dari 11 hingga 13 digit.');
            } else {
                kontakError.text('');
            }
        });

        // nama paket wisata
        $('#namaPaket').on('input', function() {
            var namaPaketInput = $(this);
            var namaPaketErrorDiv = $('#namaPaket-error');

            if (namaPaketInput.val().length > 255) {
                namaPaketInput.val(namaPaketInput.val().substring(0, 255));
                namaPaketErrorDiv.show();
            } else {
                namaPaketErrorDiv.hide();
            }
        });

        // durasi paket
        $('#durasi').on('input', function() {
            var durasiInput = $(this);
            var durasiErrorDiv = $('#durasi-error');

            if (durasiInput.val().length > 255) {
                durasiInput.val(durasiInput.val().substring(0, 255));
                durasiErrorDiv.show();
            } else {
                durasiErrorDiv.hide();
            }
        });

        
        // lokasi paket
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

        // durasi paket
        $('#waktuTersedia').on('input', function() {
            var waktuTersediaInput = $(this);
            var waktuTersediaErrorDiv = $('#waktuTersedia-error');

            if (waktuTersediaInput.val().length > 255) {
                waktuTersediaInput.val(waktuTersediaInput.val().substring(0, 255));
                waktuTersediaErrorDiv.show();
            } else {
                waktuTersediaErrorDiv.hide();
            }
        });

        // durasi paket
        $('#namaKontak').on('input', function() {
            var namaKontakInput = $(this);
            var namaKontakErrorDiv = $('#namaKontak-error');

            if (namaKontakInput.val().length > 100) {
                namaKontakInput.val(namaKontakInput.val().substring(0, 100));
                namaKontakErrorDiv.show();
            } else {
                namaKontakErrorDiv.hide();
            }
        });



        $('#paketWisataFormStore').on('submit', function(event) {

            const namaPaket = $('#namaPaket').val().trim();
            const harga = $('#harga').val().trim();
            const durasi = $('#durasi').val().trim();
            const lokasi = $('#lokasi').val().trim();
            const waktuTersedia = $('#waktuTersedia').val().trim();
            const deskripsi = $('#deskripsi').val().trim();
            const rute = $('#rute').val().trim();
            const akomodasi = $('#akomodasi').val().trim();
            const syaratKetentuan = $('#syaratKetentuan').val().trim();
            const namaKontak = $('#namaKontak').val().trim();
            const kontak = $('#kontak').val().trim();

            const file1 = $('#imgInp1')[0].files.length;
            const file2 = $('#imgInp2')[0].files.length;
            const file3 = $('#imgInp3')[0].files.length;
            const file4 = $('#imgInp4')[0].files.length;
            const file5 = $('#imgInp5')[0].files.length;

            let isValid = true;


            // Validate each field
            if (namaPaket === '') {
                $('#namaPaket-empty-error').show();
                $('#namaPaket').focus();
                isValid = false;
            } else {
                $('#namaPaket-empty-error').hide();
            }


            // Validate each field
            if (harga === '') {
                $('#harga-empty-error').show();
                $('#harga').focus();
                isValid = false;
            } else {
                $('#harga-empty-error').hide();
            }


            // Validate each field
            if (durasi === '') {
                $('#durasi-empty-error').show();
                $('#durasi').focus();
                isValid = false;
            } else {
                $('#durasi-empty-error').hide();
            }


            // Validate each field
            if (lokasi === '') {
                $('#lokasi-empty-error').show();
                $('#lokasi').focus();
                isValid = false;
            } else {
                $('#lokasi-empty-error').hide();
            }


            // Validate each field
            if (waktuTersedia === '') {
                $('#waktuTersedia-empty-error').show();
                $('#waktuTersedia').focus();
                isValid = false;
            } else {
                $('#waktuTersedia-empty-error').hide();
            }


            // Validate each field
            if (deskripsi === '') {
                $('#deskripsi-empty-error').show();
                $('#deskripsi').focus();
                isValid = false;
            } else {
                $('#deskripsi-empty-error').hide();
            }


            // Validate each field
            if (rute === '') {
                $('#rute-empty-error').show();
                $('#rute').focus();
                isValid = false;
            } else {
                $('#rute-empty-error').hide();
            }


            // Validate each field
            if (akomodasi === '') {
                $('#akomodasi-empty-error').show();
                $('#akomodasi').focus();
                isValid = false;
            } else {
                $('#akomodasi-empty-error').hide();
            }


            // Validate each field
            if (syaratKetentuan === '') {
                $('#syaratKetentuan-empty-error').show();
                $('#syaratKetentuan').focus();
                isValid = false;
            } else {
                $('#syaratKetentuan-empty-error').hide();
            }


            // Validate each field
            if (namaKontak === '') {
                $('#namaKontak-empty-error').show();
                $('#namaKontak').focus();
                isValid = false;
            } else {
                $('#namaKontak-empty-error').hide();
            }


            // Validate each field
            if (kontak === '') {
                $('#kontak-empty-error').show();
                $('#kontak').focus();
                isValid = false;
            } else {
                $('#kontak-empty-error').hide();
            }

            // Image validations
            @for($i = 1; $i <= 5; $i++)
            if ($('#imgInp{{ $i }}')[0].files.length === 0 && !$('#img-upload{{ $i }}').attr('src')) {
                $('#gambar-empty-error{{ $i }}').show();
                $('#imgInp{{ $i }}').focus();
                isValid = false;
            } else {
                $('#gambar-empty-error{{ $i }}').hide();
            }
            @endfor

            if (!isValid) {
                event.preventDefault();
            }

        });

    });

    $('#akomodasi').summernote({
        placeholder: 'Masukkan Akomodasi Paket Wisata'
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

    $('#deskripsi').summernote({
        placeholder: 'Masukkan Deskripsi Paket Wisata'
        , tabsize: 2
        , toolbar: [
            ['style', ['style']]
            , ['font', ['bold', 'underline', 'clear']]
            , ['color', ['color']]
            , ['para', ['ul', 'ol', 'paragraph']],
            //   ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            //  ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    $('#rute').summernote({
        placeholder: 'Masukkan Rute Paket Wisata'
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

    $('#syaratKetentuan').summernote({
        placeholder: 'Masukkan Syarat Dan Ketentuan Paket Wisata'
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
