@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Profil Desa')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.profil.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            {{-- Deskripsi --}}
            <div class="form-group">
                <label for="deskripsi">Deskripsi profil</label>
                <textarea class="summernote w-full" name="deskripsi" id="deskripsi" rows="4" required></textarea>
            </div>

            {{-- Sejarah --}}
            <div class="form-group">
                <label for="sejarah">Sejarah</label>
                <textarea class="summernote w-full" name="sejarah" id="sejarah" rows="4" required></textarea>
            </div>

            {{-- Gambar Profil Desa --}}
            <div class="form-group">
                <label>Gambar Profil Desa Wisata</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Cari Gambar <input type="file" name="gambar" id="imgInp" accept="image/*" required>
                        </span>
                    </span>
                    <input type="text" name="gambar-text" class="form-control" readonly>
                </div>
                <span id="gambarError" class="text-danger font-semibold text-sm"></span>
                <img id='img-upload' style="width: 400px;" class="mx-auto" />
            </div>

            {{-- Button Submit --}}
            <div class="card-footer flex justify-between">
                <a href="{{ route('admin.profil') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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
        });

        $('#sejarah').summernote({
            placeholder: 'Masukkan Deskripsi Sejarah Desa Wisata'
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
            placeholder: 'Masukkan Deskripsi Profil Desa Wisata'
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
