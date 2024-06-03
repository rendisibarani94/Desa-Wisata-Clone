<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AtraksiWisataController extends Controller
{
    public function index(){
        $data = DB::table('atraksi_wisata')
        ->where('isDeleted', 0)
        ->paginate(6);
        
    return view('user.atraksi-wisata.index', ['data' => $data]);
    }

    public function detail($id){
        $data = DB::table('atraksi_wisata')
        ->where('isDeleted', 0)
        ->where('id', $id) 
        ->first();

        if ($data) {
            return view('user.atraksi-wisata.detail', compact('data'));
        } else {
            // Handle the case when no data is found for the provided ID
            return redirect()->route('atraksiWisata.index')->with('error', 'Atraksi not found.');
        }
    }
}
