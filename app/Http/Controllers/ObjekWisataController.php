<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjekWisataController extends Controller
{
    public function index(){
        $data = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->paginate(6);

                // Add this line for debugging
        // dd($data);
        
    return view('user.objek-wisata.index')->with('data', $data);
    }

    public function indexAlam(){
        $data = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata',1)
        ->get();

        return view('user.objek-wisata.alam.index', compact('data'));
    }

    public function indexBudaya(){
        $data = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata',2)
        ->get();

        return view('user.objek-wisata.budaya.index', compact('data'));
    }

    public function indexKreatif(){
        $data = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('idKategoriWisata',3)
        ->get();

        return view('user.objek-wisata.kreatif.index', compact('data'));
    }


    public function detail($id){
        $data = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->where('id', $id)
        ->first();

        $datas = DB::table('objek_wisata')
        ->where('statusDelete', 0)
        ->inRandomOrder()
        ->take(4)
        ->get();

        return view('user.objek-wisata.detail', compact('data', 'datas'));
        
    }
}
