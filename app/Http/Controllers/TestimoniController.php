<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    public function addTestimoni(Request $request){
        try{
            $request->validate([
            'nama' => 'required',
            'testimoni' => 'required',
        ]);

        $data = DB::table('testimoni')->insert([
            'nama' => $request->nama,
            'testimoni' => $request->testimoni,
        ]);

        if($data){
            return redirect()->back()->with('success', 'Berhasil Membuat Testimoni.');
        } else {
            return redirect()->back()->with('error', 'Gagal Membuat Testimoni, Coba Ulangi Lagi.');
        }
    }
    catch(\Exception $e){
        return redirect()->back()->with('error', 'Gagal membuat testimoni, Coba ulangi lagi.');

    }
    }
}
