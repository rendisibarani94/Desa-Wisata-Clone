@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Tambah Penginapan')
@section('Konten')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="penginapanFormStore" action="{{ route('admin.penginapan.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Nama Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="namaPenginapan">Nama Penginapan</label>
            <div id="namaPenginapan-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="namaPenginapan" class="form-control" id="namaPenginapan" placeholder="Masukkan Nama Penginapan" autocomplete="off">
            </div>
            <div id="namaPenginapan-error" style="color: red; display: none;">Maksimal Input Nama Penginapan Adalah 255 Karakter!</div>


            {{-- Harga Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="harga">Harga Penginapan</label>
            <div id="harga-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Penginapan" autocomplete="off" min="0">
            </div>

            {{-- Lokasi Penginapan --}}
            <div class="form-group">
                <div class="flex">
                <label for="lokasi">Lokasi Penginapan</label>
            <div id="lokasi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                {{-- <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Penginapan" autocomplete="off"> --}}
                <textarea class="w-full" name="lokasi" id="lokasi" rows="4" placeholder="Masukkan lokasi  Penginapan"></textarea>
            </div>

            {{-- Deskripsi Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="deskripsi">Deskripsi Penginapan</label>
            <div id="deskripsi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <textarea class="w-full" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Tentang Penginapan"></textarea>
            </div>

            {{-- Kontak Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="kontak">Kontak Penginapan</label>
            <div id="kontak-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="number" name="kontak" class="form-control" id="kontak" placeholder="Masukkan Kontak Penginapan" autocomplete="off">
                <small id="kontakHelp" class="form-text text-muted">Contoh: +6281234567890 atau 081234567890</small>
                <span id="kontakError" class="text-danger font-semibold text-sm"></span>
            </div>

            {{-- Status Wifi Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="wifi">Status Wifi Penginapan</label>
            <div id="wifi-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="wifi" class="form-control" id="wifi" placeholder="Masukkan Status Wifi Penginapan" autocomplete="off">
            </div>
            <div id="wifi-error" style="color: red; display: none;">Maksimal Input Status Wifi Adalah 100 Karakter!</div>

            {{-- Status Toilet Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="toilet">Status Toilet Penginapan</label>
            <div id="toilet-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="toilet" class="form-control" id="toilet" placeholder="Masukkan Status Toilet Penginapan" autocomplete="off">
            </div>
            <div id="toilet-error" style="color: red; display: none;">Maksimal Input Status Toilet Adalah 100 Karakter!</div>

            {{-- Status AC Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="ac">Status AC Penginapan</label>
            <div id="ac-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="ac" class="form-control" id="ac" placeholder="Masukkan Status AC Penginapan" autocomplete="off">
            </div>
            <div id="ac-error" style="color: red; display: none;">Maksimal Input Status AC Adalah 100 Karakter!</div>

            {{-- Status Breakfast Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="breakfast">Status Breakfast Penginapan</label>
            <div id="breakfast-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="breakfast" class="form-control" id="breakfast" placeholder="Masukkan Status Breakfast Penginapan" autocomplete="off">
            </div>
            <div id="breakfast-error" style="color: red; display: none;">Maksimal Input Status Breakfast Adalah 100 Karakter!</div>

            {{-- Status Contact Person Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="contactPerson">Status Contact Person Penginapan</label>
            <div id="contactPerson-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="contactPerson" class="form-control" id="contactPerson" placeholder="Masukkan Status Contact Person Penginapan" autocomplete="off">
            </div>
            <div id="contactPerson-error" style="color: red; display: none;">Maksimal Input Status Contact Adalah 100 Karakter!</div>

            {{-- Status Cleaning Service Penginapan --}}
            <div class="form-group">
                <div class="flex">
                    <label for="cleaningService">Status Cleaning Service Penginapan</label>
            <div id="cleaningService-empty-error" class="font-semibold text-red-500 ml-2" style="display: none;">*Bidang ini harus diisi!</div>
                
                </div>
                <input type="text" name="cleaningService" class="form-control" id="cleaningService" placeholder="Masukkan Status Cleaning Service Penginapan" autocomplete="off">
            </div>
            <div id="cleaningService-error" style="color: red; display: none;">Maksimal Input Status Cleaning Adalah 100 Karakter!</div>

            {{-- Gambar Penginapan --}}
            @for($i = 1; $i <= 5; $i++) <div class="form-group">
                <div class="flex">
                    <label>Gambar {{ $i }} Penginapan</label>
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
        {{-- </div> --}}
        {{-- Button Submit --}}
        <div class="card-footer flex justify-between">
            <a href="{{ route('admin.penginapan.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Kembali</a>
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

        $('#penginapanFormStore').on('submit', function(event) {
            var kontak = $('#kontak').val();
            var kontakError = $('#kontakError');

            if (kontak.length < 11 || kontak.length > 13) {
                event.preventDefault();
                kontakError.text('Kontak harus terdiri dari 11 hingga 13 digit.');
            } else {
                kontakError.text('');
            }
        });

        // lokasi singkat
        $('#namaPenginapan').on('input', function() {
            var namaPenginapanInput = $(this);
            var namaPenginapanErrorDiv = $('#namaPenginapan-error');

            if (namaPenginapanInput.val().length > 255) {
                namaPenginapanInput.val(namaPenginapanInput.val().substring(0, 255));
                namaPenginapanErrorDiv.show();
            } else {
                namaPenginapanErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#wifi').on('input', function() {
            var wifiInput = $(this);
            var wifiErrorDiv = $('#wifi-error');

            if (wifiInput.val().length > 255) {
                wifiInput.val(wifiInput.val().substring(0, 100));
                wifiErrorDiv.show();
            } else {
                wifiErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#toilet').on('input', function() {
            var toiletInput = $(this);
            var toiletErrorDiv = $('#toilet-error');

            if (toiletInput.val().length > 255) {
                toiletInput.val(toiletInput.val().substring(0, 100));
                toiletErrorDiv.show();
            } else {
                toiletErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#ac').on('input', function() {
            var acInput = $(this);
            var acErrorDiv = $('#ac-error');

            if (acInput.val().length > 255) {
                acInput.val(acInput.val().substring(0, 100));
                acErrorDiv.show();
            } else {
                acErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#breakfast').on('input', function() {
            var breakfastInput = $(this);
            var breakfastErrorDiv = $('#breakfast-error');

            if (breakfastInput.val().length > 255) {
                breakfastInput.val(breakfastInput.val().substring(0, 100));
                breakfastErrorDiv.show();
            } else {
                breakfastErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#contactPerson').on('input', function() {
            var contactPersonInput = $(this);
            var contactPersonErrorDiv = $('#contactPerson-error');

            if (contactPersonInput.val().length > 255) {
                contactPersonInput.val(contactPersonInput.val().substring(0, 100));
                contactPersonErrorDiv.show();
            } else {
                contactPersonErrorDiv.hide();
            }
        });

        // lokasi singkat
        $('#cleaningService').on('input', function() {
            var cleaningServiceInput = $(this);
            var cleaningServiceErrorDiv = $('#cleaningService-error');

            if (cleaningServiceInput.val().length > 255) {
                cleaningServiceInput.val(cleaningServiceInput.val().substring(0, 255));
                cleaningServiceErrorDiv.show();
            } else {
                cleaningServiceErrorDiv.hide();
            }
        });

        $('#penginapanFormStore').on('submit', function(event) {

            const namaPenginapan = $('#namaPenginapan').val().trim();
            const harga = $('#harga').val().trim();
            const lokasi = $('#lokasi').val().trim();
            const deskripsi = $('#deskripsi').val().trim();
            const kontak = $('#kontak').val().trim();
            const wifi = $('#wifi').val().trim();
            const toilet = $('#toilet').val().trim();
            const ac = $('#ac').val().trim();
            const breakfast = $('#breakfast').val().trim();
            const contactPerson = $('#contactPerson').val().trim();
            const cleaningService = $('#cleaningService').val().trim();

            const file1 = $('#imgInp1')[0].files.length;
            const file2 = $('#imgInp2')[0].files.length;
            const file3 = $('#imgInp3')[0].files.length;
            const file4 = $('#imgInp4')[0].files.length;
            const file5 = $('#imgInp5')[0].files.length;

            let isValid = true;


            // Validate each field
            if (namaPenginapan === '') {
                $('#namaPenginapan-empty-error').show();
                $('#namaPenginapan').focus();
                isValid = false;
            } else {
                $('#namaPenginapan-empty-error').hide();
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
            if (lokasi === '') {
                $('#lokasi-empty-error').show();
                $('#lokasi').focus();
                isValid = false;
            } else {
                $('#lokasi-empty-error').hide();
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
            if (kontak === '') {
                $('#kontak-empty-error').show();
                $('#kontak').focus();
                isValid = false;
            } else {
                $('#kontak-empty-error').hide();
            }


            // Validate each field
            if (wifi === '') {
                $('#wifi-empty-error').show();
                $('#wifi').focus();
                isValid = false;
            } else {
                $('#wifi-empty-error').hide();
            }


            // Validate each field
            if (toilet === '') {
                $('#toilet-empty-error').show();
                $('#toilet').focus();
                isValid = false;
            } else {
                $('#toilet-empty-error').hide();
            }


            // Validate each field
            if (ac === '') {
                $('#ac-empty-error').show();
                $('#ac').focus();
                isValid = false;
            } else {
                $('#ac-empty-error').hide();
            }


            // Validate each field
            if (breakfast === '') {
                $('#breakfast-empty-error').show();
                $('#breakfast').focus();
                isValid = false;
            } else {
                $('#breakfast-empty-error').hide();
            }


            // Validate each field
            if (contactPerson === '') {
                $('#contactPerson-empty-error').show();
                $('#contactPerson').focus();
                isValid = false;
            } else {
                $('#contactPerson-empty-error').hide();
            }


            // Validate each field
            if (cleaningService === '') {
                $('#cleaningService-empty-error').show();
                $('#cleaningService').focus();
                isValid = false;
            } else {
                $('#cleaningService-empty-error').hide();
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

    $('#deskripsi').summernote({
        placeholder: 'Masukkan Deskripsi Penginapan'
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

    $('#lokasi').summernote({
        placeholder: 'Masukkan Lokasi Penginapan'
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
