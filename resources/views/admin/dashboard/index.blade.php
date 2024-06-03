@extends('admin.layout.adminMaster')
@section('Judul_Tab', 'Dashboard Admin')
@section('Konten')
<br><br>
<h2 class="text-4xl mt-2 mx-3 font-roboto mb-2 font-bold">Dashboard</h2>
<br><br>

{{-- Row 1 --}}
<h4 class="font-roboto text-lg font-semibold text-sky-900 mb-2">Objek Wisata</h4>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $data['wisata'] }}</h3>

                <p>Jumlah Objek Wisata</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('AdminDestinationView') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $data['wisataAlam'] }}</h3>

                <p>Objek Wisata Alam</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('AdminDestinationView') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $data['wisataBudaya'] }}</h3>

                <p>Objek Wisata Budaya</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('AdminDestinationView') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $data['wisataKreatif'] }}</h3>

                <p>Objek Wisata Kreatif</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('AdminDestinationView') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

{{-- Row 2 --}}
<h4 class="font-roboto text-lg font-semibold text-sky-900 mb-2">Informasi Wisata</h4>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $data['berita'] }} </h3>

                <p>Jumlah Berita Wisata</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('berita-wisata.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $data['atraksi'] }}</h3>

                <p>Jumlah Atraksi Wisata</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('atraksi-wisata.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $data['paketWisata'] }}</h3>

                <p>Jumlah Paket Wisata</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admin.paketWisata.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>


{{-- Row 3 --}}
<h4 class="font-roboto text-lg font-semibold text-sky-900 mb-2">Layanan Wisata</h4>
<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $data['penginapan'] }}</h3>

                <p>Jumlah Penginapan</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.penginapan.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $data['bank'] }}</h3>

                <p>Jumlah Bank</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.bank.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $data['rumah_makan'] }}</h3>

                <p>Jumlah Rumah Makan</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.rumahMakan.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $data['fasilitas_kesehatan'] }}</h3>

                <p>Jumlah Fasilitas Kesehatan</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('fasilitas-kesehatan.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $data['rumah_ibadah'] }}</h3>

                <p>Jumlah Rumah Ibadah</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.rumahIbadah.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>


{{-- Row 4 --}}
<h4 class="font-roboto text-lg font-semibold text-sky-900 mb-2">Produk UMKM</h4>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info ">
            <div class="inner">
                <h3>{{ $data['produkUmkm'] }}</h3>

                <p>Jumlah Produk Umkm</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $data['pakaian'] }}</h3>

                <p>Jumlah Produk Pakaian</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.umkm.pakaian.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $data['souvenir'] }}</h3>

                <p>Jumlah Produk Souvenir</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.umkm.sovenir.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $data['makanan'] }}</h3>

                <p>Jumlah Produk Makanan</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admin.umkm.makanan.index') }}" class="small-box-footer">Kelola Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@endsection
