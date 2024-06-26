@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Atraksi Wisata')
@section('Konten')

<ol class="breadcrumb float-sm-left text-blue-500 font-semibold">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item active">Atraksi Wisata</li>
</ol><br><br><br>

<div class="flex justify-between mx-3">
    <h2 class="text-4xl mt-2 mx-2 font-roboto font-bold">Atraksi Wisata</h2>
    <a href="{{ route('atraksi-wisata.store') }}" class="btn bg-gradient-success ml-auto mr-4 font-semibold mt-2">Tambah Data</a>
</div>
<br><br>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Atraksi Wisata</h3>
        <div class="card-tools">
            <div class="flex items-center">
                <input type="text" id="table_search" name="table_search" class="form-control form-control-sm w-64 mr-2" placeholder="Cari Berita Wisata...">
                <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-search text-blue hover:text-white"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table id="tabel" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Atraksi</th>
                    <th>Tarif</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="table_body">
                @php
                $no = 1;
                @endphp
                @foreach($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    {{-- <td>{{ $item->namaAtraksi }}</td> --}}
                    <td>{{ Str::limitParagraph(strip_tags($item->namaAtraksi), 50) }}</td>

                    <td>{{ 'Rp ' . number_format($item->tarif, 0, ',', '.') }}</td>
                    {{-- <td>{{ $item->lokasi }}</td> --}}
                    <td>{{ Str::limitParagraph(strip_tags($item->lokasi), 50) }}</td>
                    <td>
                        <a href="{{ route('atraksi-wisata.edit', $item->id) }}" class="btn btn-warning text-white font-semibold">Ubah</a>
                        <button class="btn btn-danger delete-button font-semibold" data-id="{{ $item->id }}">Hapus</button>
                    </td>
                </tr>
                @endforeach
                <form id="delete-form" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swal === 'undefined') {
        console.error('SweetAlert library is not loaded.');
        return;
    }
        const searchInput = document.getElementById('table_search');
        const tableBody = document.getElementById('table_body');
        const rows = tableBody.getElementsByTagName('tr');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        let cellText = cells[j].innerText.toLowerCase();
                        if (cellText.indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }
                rows[i].style.display = match ? '' : 'none';
            }
        });

        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah anda yakin?'
                    , text: "Data yang dihapus tidak akan dapat dikembalikan!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Ya, Hapus!'
                    , cancelButtonText: "Kembali"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('delete-form');
                        form.action = `/admin/atraksi-wisata/${itemId}`;
                        form.submit();
                    }
                });
            });
        });

w
    });

</script>
@endsection
