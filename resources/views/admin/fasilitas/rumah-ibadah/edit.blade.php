@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Edit Rumah Ibadah')
@section('Konten')

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Ubah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="rumahIbadahFormEdit" action="{{ route('admin.rumahIbadah.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            {{-- Nama Rumah Ibadah --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaRumahIbadah">Nama Rumah Ibadah</label>
            <div id="namaRumahIbadah-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaRumahIbadah" value="{{ $data->namaRumahIbadah }}" class="form-control" id="namaRumahIbadah" placeholder="Masukkan Nama Rumah Ibadah" autocomplete="off">
            </div>
            <div id="namaRumahIbadah-error" style="color: red; display: none;">Maksimal Input Nama Rumah Ibadah Adalah 255 Karakter!</div>

            {{-- Lokasi Rumah Ibadah--}}
            <div class="form-group">
                <div class="flex">
                    <label for="lokasi">Lokasi Rumah Ibadah</label>
            <div id="lokasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="lokasi" value="{{ $data->lokasi }}" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Rumah Ibadah" autocomplete="off">
            </div>
            <div id="lokasi-error" style="color: red; display: none;">Maksimal Input Lokasi Adalah 255 Karakter!</div>

            {{-- Deskripsi Rumah Ibadah --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Rumah Ibadah</label>
            <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="deskripsi w-full" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Tentang Rumah Ibadah">{{ $data->deskripsi }}</textarea>
            </div>
            <div id="deskripsi-error" style="color: red; display: none;">Maksimal Input Deskripsi Adalah 255 Karakter!</div>

            {{-- Jadwal Beribadah --}}
            <div class="form-group">
                <div class="flex">
                    <label for="jadwalIbadah">Jadwal Beribadah</label>
            <div id="jadwalIbadah-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="jadwalIbadah" id="jadwalIbadah" rows="4">{{ $data->jadwalIbadah }}</textarea>
            </div>

            {{-- Konten --}}
            <div class="form-group">
                <div class="flex">
                    <label for="isiKonten">Konten</label>
            <div id="isiKonten-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="summernote w-full" name="isiKonten" id="isiKonten" rows="4">{{ $data->isiKonten }}</textarea>
            </div>

            {{-- Gambar Fasilitas Kesehatan --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Rumah Makan</label>
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
                <img src="{{ asset('images/fasilitas/rumah-ibadah/'. $data->gambar) }}" id='img-upload' style="width: 400px;" class="mx-auto">
            </div>



            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('admin.rumahIbadah.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded ml-auto">Ubah Data</button>
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
            $('#rumahIbadahFormEdit').on('submit', function(event) {
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
            $('#namaRumahIbadah').on('input', function() {
                var namaRumahIbadahInput = $(this);
                var namaRumahIbadahErrorDiv = $('#namaRumahIbadah-error');
    
                if (namaRumahIbadahInput.val().length > 255) {
                    namaRumahIbadahInput.val(namaRumahIbadahInput.val().substring(0, 255));
                    namaRumahIbadahErrorDiv.show();
                } else {
                    namaRumahIbadahErrorDiv.hide();
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
    
            $('#rumahIbadahFormEdit').on('submit', function(event) {
    
                const namaRumahIbadah = $('#namaRumahIbadah').val().trim();
                const lokasi = $('#lokasi').val().trim();
                const deskripsi = $('#deskripsi').val().trim();
                const jadwalIbadah = $('#jadwalIbadah').val().trim();
                const isiKonten = $('#isiKonten').val().trim();
                const file = $('#imgInp')[0].files.length;
    
                let isValid = true;
    
                // Validate each field
                if (namaRumahIbadah === '') {
                    $('#namaRumahIbadah-empty-error').show();
                    $('#namaRumahIbadah').focus();
                    isValid = false;
                } else {
                    $('#namaRumahIbadah-empty-error').hide();
                }
    
                if (lokasi === '') {
                    $('#lokasi-empty-error').show();
                    $('#lokasi').focus();
                    isValid = false;
                } else {
                    $('#lokasi-empty-error').hide();
                }
    
                if (deskripsi === '') {
                    $('#deskripsi-empty-error').show();
                    $('#deskripsi').focus();
                    isValid = false;
                } else {
                    $('#deskripsi-empty-error').hide();
                }
    
                if (jadwalIbadah === '') {
                    $('#jadwalIbadah-empty-error').show();
                    $('#jadwalIbadah').focus();
                    isValid = false;
                } else {
                    $('#jadwalIbadah-empty-error').hide();
                }
    
                if (isiKonten === '') {
                    $('#isiKonten-empty-error').show();
                    $('#isiKonten').focus();
                    isValid = false;
                } else {
                    $('#isiKonten-empty-error').hide();
                }
    
                // Gambar validation (only if no existing image)
                if (!file && !$('#img-upload').attr('src')) {
                    $('#gambar-empty-error').show();
                    $('#gambar').focus();
                    isValid = false;
                } else {
                    $('#gambar-empty-error').hide();
                }
    
                if (!isValid) {
                    event.preventDefault();
                }
            });
    
    
        });
    
    
        $('#isiKonten').summernote({
            placeholder: 'Masukkan Isi Konten Rumah Ibadah'
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
    
        $('#jadwalIbadah').summernote({
            placeholder: 'Masukkan Data / Deskripsi Jadwal Ibadah'
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
    