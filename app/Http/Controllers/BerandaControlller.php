<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaControlller extends Controller
{
    public function index(){
        $paket = DB::table('paket_wisata')
            ->where('isDeleted', 0)
            ->get();
    
        $atraksi = DB::table('atraksi_wisata')
            ->where('isDeleted', 0)
            ->get();
    
        $objek = DB::table('objek_wisata')
            ->where('statusDelete', 0)
            ->get();

            $testimoni = DB::table('testimoni')
            ->orderByDesc('id')
            ->get();
    
        return view('user.beranda.index', compact('paket', 'atraksi', 'objek', 'testimoni',));
    }
}
