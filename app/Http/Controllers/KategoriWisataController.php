<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriWisataController extends Controller
{
    public function index(){
        return view('user.kategori_wisata.index');
    }
}
