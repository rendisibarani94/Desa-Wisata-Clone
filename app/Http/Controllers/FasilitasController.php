<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function index(){
        return view('user.fasilitas-wisata.fasilitas');
    }

    public function bankIndex(){
        $data = DB::table('bank')
        ->where('isDeleted', 0)
        ->paginate(3);

        return view('user.fasilitas-wisata.bank.index', compact('data'));
    }

    public function detailBank($id){
        $data = DB::table('bank')
        ->where('isDeleted', 0)
        ->where('id', $id)
        ->first();

        return view('user.fasilitas-wisata.bank.detail', compact('data'));
    }

    public function kesehatanIndex(){
        $data = DB::table('fasilitas_kesehatan')
        ->where('isDeleted', 0)
        ->paginate(3);
        return view('user.fasilitas-wisata.kesehatan.index', compact('data'));
    }

    public function detailKesehatan($id){
        $data = DB::table('fasilitas_kesehatan')
        ->where('isDeleted', 0)
        ->where('id', $id)
        ->first();
        return view('user.fasilitas-wisata.kesehatan.detail', compact('data'));
    }

    public function rumahMakanIndex(){
        $data = DB::table('rumah_makan')
        ->where('isDeleted', 0)
        ->paginate(3);

        return view('user.fasilitas-wisata.rumah-makan.index', compact('data'));
    }

    public function detailrumahMakan($id){
        $data = DB::table('rumah_makan')
        ->where('isDeleted', 0)
        ->where('id', $id)
        ->first();

        return view('user.fasilitas-wisata.rumah-makan.detail', compact('data'));
    }

    public function rumahIbadahIndex(){
        $data = DB::table('rumah_ibadah')
        ->where('isDeleted', 0)
        ->paginate(3);
        
        return view('user.fasilitas-wisata.rumah-ibadah.index', compact('data'));
    }

    public function detailrumahIbadah($id){
        $data = DB::table('rumah_ibadah')
        ->where('isDeleted', 0)
        ->where('id', $id)
        ->first();

        return view('user.fasilitas-wisata.rumah-ibadah.detail', compact('data'));
    }

}
