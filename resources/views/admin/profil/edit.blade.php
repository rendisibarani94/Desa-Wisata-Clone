@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Edit Profil Desa')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="profilDesaForm" action="{{ route('admin.profil.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card-body">

            {{-- Deskripsi --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi profil</label>
                    <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <textarea class="summernote w-full" name="deskripsi" id="deskripsi" rows="4" required>{{ $data->deskripsi }}</textarea>
            </div>

            {{-- Sejarah --}}
            <div class="form-group">
                <div class="flex">
                    <label for="sejarah">Sejarah</label>
                    <div id="sejarah-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>

                </div>
                <textarea class="summernote w-full" name="sejarah" id="sejarah" rows="4" required>{{ $data->sejarah }}</textarea>
            </div>

            {{-- Gambar Profil Desa --}}
            <div class="form-group">
                <div class="flex">
                    <label>Gambar Profil Desa Wisata</label>
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
                <img src="{{ asset('images/profil/'. $data->gambar) }}" id='img-upload' style="width: 400px;" class="mx-auto">
            </div>

            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('admin.profil') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded ml-auto">Ubah Data</button>
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
                if (file) {
                    const fileType = file.type.split('/')[1];
                    const fileSize = file.size;
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    const validImageTypes = ['jpeg', 'png', 'jpg', 'gif'];

                    if (!validImageTypes.includes(fileType)) {
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
                } else {
                    $(errorElement).text('Gambar harus diunggah.');
                    return false;
                }
            }

            $("#imgInp").change(function() {
                const isValid = validateImage(this, '#gambarError');
                if (isValid) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

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

            var textarea = $('#deskripsiDestinasi');
            textarea.height(textarea[0].scrollHeight + 'px');

            textarea.on('input', function() {
                $(this).height(0);
                $(this).height(this.scrollHeight + 'px');
            });

            $('#profilDesaForm').on('submit', function(event) {
                const deskripsi = $('#deskripsi').val().trim();
                const sejarah = $('#sejarah').val().trim();
                const file = $('#imgInp')[0].files.length;

                let isValid = true;

                if (deskripsi === '') {
                    $('#deskripsi-empty-error').show();
                    isValid = false;
                } else {
                    $('#deskripsi-empty-error').hide();
                }

                if (sejarah === '') {
                    $('#sejarah-empty-error').show();
                    isValid = false;
                } else {
                    $('#sejarah-empty-error').hide();
                }

                if (!file && !$('#img-upload').attr('src')) {
                    $('#gambar-empty-error').show();
                    isValid = false;
                } else {
                    $('#gambar-empty-error').hide();
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });


            $('#sejarah').summernote({
                placeholder: 'Masukkan Deskripsi Sejarah Desa Wisata'
                , tabsize: 2
                , toolbar: [
                    ['style', ['style']]
                    , ['font', ['bold', 'underline', 'clear']]
                    , ['color', ['color']]
                    , ['para', ['ul', 'ol', 'paragraph']]
                , ]
            });

            $('#deskripsi').summernote({
                placeholder: 'Masukkan Deskripsi Profil Desa Wisata'
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
