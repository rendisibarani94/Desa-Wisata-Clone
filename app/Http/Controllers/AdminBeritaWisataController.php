<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBeritaWisataController extends Controller
{

    public function AdminBeritaWisataView(){
    $data = DB::table('berita_wisata')
    ->join('users', 'berita_wisata.penulis', '=', 'users.id')
    ->select('berita_wisata.*', 'users.name as penulis')
    ->where('berita_wisata.isDeleted', 0)
    ->get();

        return view('admin.berita-wisata.index', ['data' => $data]);
    }

    public function AdminBeritaWisataStore(){
        return view('admin.berita-wisata.store');
    }

    public function CreateBeritaWisata(Request $request){
        try {
            // Validate the incoming request data
            $request->validate([
                'judulBerita' => 'required',
                'tanggalBerita' => 'required',
                'deskripsi' => 'required',
                'isiBerita' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
                'penulis' => 'required',
            ]);
    
            // Handle file upload
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/berita-wisata'), $imageName);
    
            // Store the form input into the database
            $data = DB::table('berita_wisata')->insert([
                'judulBerita' => $request->judulBerita,
                'tanggalBerita' => $request->tanggalBerita,
                'deskripsi' => $request->deskripsi,
                'isiBerita' => $request->isiBerita,
                'gambar' => $imageName,
                'penulis' => $request->penulis
            ]);
    
            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('berita-wisata.index')->with('success', 'Berhasil Menambah Berita Wisata.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Menambahkan Berita Wisata. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Berita Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function deleteBeritaWisata($id){
        $affected = DB::table('berita_wisata')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);

        if ($affected) {
            return redirect()->route('berita-wisata.index')->with('success', 'Berita Wisata Berhasil Dihapus');
        }
        else {
        return redirect()->back()->with('error', 'Berita Wisata Gagal Dihapus');
        }
    }

    public function editBeritaWisata($id){
        $data = DB::table('berita_wisata')
        ->join('users', 'berita_wisata.penulis', '=', 'users.id')
        ->select('berita_wisata.*', 'users.name as penulis')
        ->where('berita_wisata.id', $id)
        ->first();
            return view('admin.berita-wisata.edit', compact('data'));
    }

    public function updateBeritaWisata(Request $request, $id){
        try {
    // Validate the incoming request data
    $request->validate([
        'judulBerita' => 'required',
        'tanggalBerita' => 'required',
        'deskripsi' => 'required',
        'isiBerita' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        'penulis' => 'required',
    ]);
// Get the existing data
$berita = DB::table('berita_wisata')->where('id', $id)->first();

// Handle file upload if there's a new image
if ($request->hasFile('gambar')) {
    // Delete the old image
    if (file_exists(public_path('images/berita-wisata/' . $berita->gambar))) {
        unlink(public_path('images/berita-wisata/' . $berita->gambar));
    }
    // Move the new image to the appropriate directory
    $imageName = time().'.'.$request->gambar->extension();  
    $request->gambar->move(public_path('images/berita-wisata'), $imageName);
} else {
    // Keep the existing image if there's no new image
    $imageName = $berita->gambar;
}
    // Update the data in the database
    $data = DB::table('berita_wisata')
            ->where('id', $id)
            ->update([
                'judulBerita' => $request->judulBerita,
                'tanggalBerita' => $request->tanggalBerita,
                'deskripsi' => $request->deskripsi,
                'isiBerita' => $request->isiBerita,
                'gambar' => $imageName,
                'penulis' => $request->penulis
            ]);

    if ($data) {
        // If insertion is successful, redirect with success message
        return redirect()->route('berita-wisata.index')->with('success', 'Berhasil Mengubah Berita Wisata.');
    } else {
        // If insertion fails, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Mengubah Berita Wisata. Pastikan Tidak Ada Data Yang Kosong.');
    }
} catch (\Exception $e) {
    // Exception occurred, redirect back with error message
    return redirect()->back()->with('error', 'Gagal Mengubah Berita Wisata. Periksa Kembali Data Masukan Anda.');
}
    }
}
