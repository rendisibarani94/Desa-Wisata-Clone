<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketWisataController extends Controller
{
    public function index(){
        $paket = DB::table('paket_wisata')
            ->where('isDeleted', 0)
            ->paginate(6);

        return view('user.paket-wisata.index', compact('paket'));
    }

    public function detail($id){
        $data = DB::table('paket_wisata')->get()
        ->where('id', $id)
        ->first();

        return view('user.paket-wisata.detail', compact('data'));
    }

}
