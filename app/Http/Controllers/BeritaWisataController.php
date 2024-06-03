<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeritaWisataController extends Controller
{
    public function index() {
        // Retrieve paginated data
        $data = DB::table('berita_wisata')
            ->where('isDeleted', 0)
            ->paginate(3);
    
        // Transform the paginated data to include formatted dates
        $data->getCollection()->transform(function ($item) {
            $item->formatted_date = Carbon::parse($item->tanggalBerita)->translatedFormat('l, d F Y');
            return $item;
        });
    
        return view('user.berita-wisata.index', ['data' => $data]);
    }

    
    public function detail($id) {
        $data = DB::table('berita_wisata')
            ->join('users', 'berita_wisata.penulis', '=', 'users.id')
            ->select('berita_wisata.*', 'users.name as penulis')
            ->where('berita_wisata.isDeleted', 0)
            ->where('berita_wisata.id', $id)
            ->first();
    
        if ($data) {
            // Manually transform the data
            $data->formatted_date = Carbon::parse($data->tanggalBerita)->translatedFormat('l, d F Y');
    
            return view('user.berita-wisata.detail', compact('data'));
        } else {
            // Handle the case when no data is found for the provided ID
            return redirect()->route('atraksiWisata.index')->with('error', 'Berita not found.');
        }
    }
    
}
