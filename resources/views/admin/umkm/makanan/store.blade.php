@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Produk UMKM')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="umkmFormMakanan" action="{{ route('admin.umkm.makanan.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Kategori Produk UMKM --}}
            <div class="form-group">
                <label for="exampleSelectRounded0">Kategori Produk UMKM</label>
                <select class="custom-select rounded-0" name="id_kategori_umkm" id="exampleSelectRounded0">
                    <option value="1" selected>Produk Makanan</option>
                    <option value="2">Produk Sovenir</option>
                    <option value="3">Produk Pakaian</option>
                </select>
            </div>

            {{-- Nama Produk --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaProduk">Nama Produk</label>
            <div id="namaProduk-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaProduk" class="form-control" id="namaProduk" placeholder="Masukkan Nama Produk " autocomplete="off">
            </div>
            <div id="namaProduk-error" style="color: red; display: none;">Maksimal Input Nama Produk Adalah 255 Karakter!</div>

            {{-- Nama Produk --}}
            <div class="form-group">
                <div class="flex">
                    <label for="harga">Harga Produk</label>
            <div id="harga-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Produk " autocomplete="off" min="0">
            </div>

            {{-- Nama Kuantitas --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaQuantity">Nama Kuantitas</label>
            <div id="namaQuantity-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaQuantity" class="form-control" id="namaQuantity" placeholder="Masukkan Nama Kuantitas Produk " autocomplete="off">
            </div>
            <div id="namaQuantity-error" style="color: red; display: none;">Maksimal Input Nama Kuantitas Adalah 50 Karakter!</div>

            {{-- Nama Pemilik --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaKontak">Nama Pemilik</label>
            <div id="namaKontak-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaKontak" class="form-control" id="namaKontak" placeholder="Masukkan Nama Pemilik Produk UMKM " autocomplete="off">
            </div>
            <div id="namaKontak-error" style="color: red; display: none;">Maksimal Input Nama Pemilik Adalah 100 Karakter!</div>

            {{-- Kontak Pemilik --}}
            <div class="form-group">
                <div class="flex">
                    <label for="kontak">Kontak Pemilik</label>
            <div id="kontak-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="number" name="kontak" class="form-control" id="kontak" placeholder="Masukkan Kontak Pemilik Produk UMKM" autocomplete="off">
                <span id="kontakError" class="text-danger font-semibold text-sm"></span>
            </div>


            {{-- Deskripsi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Produk</label>
            <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="deskripsi" id="deskripsi" rows="4"></textarea>
            </div>

            {{-- Gambar Produk --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Produk</label>
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
                <a href="{{ route('admin.umkm.makanan.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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

            $('#kontak').on('input', function() {
                var kontak = $(this).val();
                var kontakError = $('#kontakError');

                if (kontak.length < 11 || kontak.length > 13) {
                    kontakError.text('Kontak harus terdiri dari 11 hingga 13 karakter.');
                } else {
                    kontakError.text('');
                }
            });

            // Form Validation
            $('#umkmFormMakanan').on('submit', function(event) {
                var kontak = $('#kontak').val();
                var file = $('#imgInp')[0].files[0];
                var imgError = $('#gambarError');

                if (kontak.length < 11 || kontak.length > 13) {
                    event.preventDefault();
                    $('#kontakError').text('Kontak harus terdiri dari 11 hingga 13 karakter.');
                }

                if (file) {
                    var validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validImageTypes.includes(file.type)) {
                        event.preventDefault();
                        imgError.text('Format gambar harus berupa jpeg, jpg, png, atau gif.');
                    } else if (file.size > 2040 * 1024) {
                        event.preventDefault();
                        imgError.text('Ukuran gambar tidak boleh lebih dari 2 MB.');
                    } else {
                        imgError.text('');
                    }
                }
            });

            // Nama Produk
            $('#namaProduk').on('input', function() {
                var namaProdukInput = $(this);
                var namaProdukErrorDiv = $('#namaProduk-error');

                if (namaProdukInput.val().length > 255) {
                    namaProdukInput.val(namaProdukInput.val().substring(0, 255));
                    namaProdukErrorDiv.show();
                } else {
                    namaProdukErrorDiv.hide();
                }
            });

            // Nama Kuantitas
            $('#namaQuantity').on('input', function() {
                var namaQuantityInput = $(this);
                var namaQuantityErrorDiv = $('#namaQuantity-error');

                if (namaQuantityInput.val().length > 50) {
                    namaQuantityInput.val(namaQuantityInput.val().substring(0, 50));
                    namaQuantityErrorDiv.show();
                } else {
                    namaQuantityErrorDiv.hide();
                }
            });

            // Nama Kuantitas
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

            $('#umkmFormMakanan').on('submit', function(event) {
                const namaProduk = $('#namaProduk').val().trim();
                const harga = $('#harga').val().trim();
                const namaQuantity = $('#namaQuantity').val().trim();
                const namaKontak = $('#namaKontak').val().trim();
                const kontak = $('#kontak').val().trim();
                const deskripsi = $('#deskripsi').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;
                 // Validate each field
            if (namaProduk === '') {
                $('#namaProduk-empty-error').show();
                isValid = false;
                $('#namaProduk').focus();
            } else {
                $('#namaProduk-empty-error').hide();
            }

            // Validate each field
            if (harga === '') {
                $('#harga-empty-error').show();
                isValid = false;
                $('#harga').focus();
            } else {
                $('#harga-empty-error').hide();
            }

            // Validate each field
            if (namaQuantity === '') {
                $('#namaQuantity-empty-error').show();
                isValid = false;
                $('#namaQuantity').focus();
            } else {
                $('#namaQuantity-empty-error').hide();
            }

            // Validate each field
            if (namaKontak === '') {
                $('#namaKontak-empty-error').show();
                isValid = false;
                $('#namaKontak').focus();
            } else {
                $('#namaKontak-empty-error').hide();
            }

            // Validate each field
            if (kontak === '') {
                $('#kontak-empty-error').show();
                isValid = false;
                $('#kontak').focus();
            } else {
                $('#kontak-empty-error').hide();
            }

            // Validate each field
            if (deskripsi === '') {
                $('#deskripsi-empty-error').show();
                isValid = false;
                $('#deskripsi').focus();
            } else {
                $('#deskripsi-empty-error').hide();
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

        $('#deskripsi').summernote({
            placeholder: 'Masukkan Isi Deskripsi Produk'
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
