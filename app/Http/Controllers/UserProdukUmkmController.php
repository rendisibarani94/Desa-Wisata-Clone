<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProdukUmkmController extends Controller
{
    public function index(){
        $makanan = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 1)
        ->get();

        $sovenir = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 2)
        ->get();

        $pakaian = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 3)
        ->get();

        return view('user.umkm.index', compact('makanan', 'sovenir', 'pakaian'));
    }

    public function makananIndex(){
        $data = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 1)
        ->get();

        return view('user.umkm.makanan.index', compact('data'));
    }

    public function sovenirIndex(){
        $data = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 2)
        ->get();

        return view('user.umkm.sovenir.index', compact('data'));
    }

    public function pakaianIndex(){
        $data = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id_kategori_umkm', 3)
        ->get();

        return view('user.umkm.pakaian.index', compact('data'));
    }

    public function allIndex(){
        $data = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->get();

        return view('user.umkm.all', compact('data'));
    }

    public function detailProdukUmkm($id){
        $data = DB::table('produk_umkm')
        ->where('isDeleted', 0)
        ->where('id', $id)
        ->first();

        return view('user.umkm.detail', compact('data'));
    }

}
