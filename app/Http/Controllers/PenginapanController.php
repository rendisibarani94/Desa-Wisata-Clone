<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenginapanController extends Controller
{
    public function index(){

        $data = DB::table('penginapan')
        ->where('isDeleted', 0)
        ->paginate(6);

        return view('user.fasilitas-wisata.penginapan.index', compact('data'));
    }

    public function detail($id){
        $data = DB::table('penginapan')
        ->where('isDeleted', 0)
        ->where('id',$id)
        ->first();

        return view('user.fasilitas-wisata.penginapan.detail', compact('data'));
    }
}
