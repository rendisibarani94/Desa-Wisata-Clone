<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data['wisata'] = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->count();

        $data['wisataAlam'] = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata', 1)
        ->count();

        $data['wisataBudaya'] = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata', 2)
        ->count();

        $data['wisataKreatif'] = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata', 3)
        ->count();

        $data['berita'] = DB::table('berita_wisata')
        ->where('isDeleted', 0)
        ->count();

        $data['atraksi'] = DB::table('atraksi_wisata')
        ->where('isDeleted', 0)
        ->count();

        $data['paketWisata'] = DB::table('paket_wisata')
        ->where('isDeleted', 0)
        ->count();

        $data['bank'] = DB::table('bank')
        ->where('isDeleted', 0)
        ->count();

        $data['penginapan'] = DB::table('penginapan')
        ->where('isDeleted', 0)
        ->count();

        $data['rumah_ibadah'] = DB::table('rumah_ibadah')
        ->where('isDeleted', 0)
        ->count();

        $data['rumah_makan'] = DB::table('rumah_makan')
        ->where('isDeleted', 0)
        ->count();

        $data['fasilitas_kesehatan'] = DB::table('fasilitas_kesehatan')
        ->where('isDeleted', 0)
        ->count();

        $data['produkUmkm'] = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->count();

        $data['pakaian'] = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm',3)
        ->count();

        $data['souvenir'] = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm',2)
        ->count();

        $data['makanan'] = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm',1)
        ->count();

        


        return view('admin.dashboard.index', compact('data'));
    }
}
