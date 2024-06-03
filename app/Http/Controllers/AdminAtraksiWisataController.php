<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminAtraksiWisataController extends Controller
{
    public function AdminAtraksiWisataView(){
        $data = DB::table('atraksi_wisata')->get()
        ->where('isDeleted', 0);
        return view('admin.attraksi-wisata.index', ['data' => $data]);
    }

    public function AdminAtraksiWisataStore(){
        return view('admin.attraksi-wisata.store');
    }

    public function deleteAtraksiWisata($id){
        $affected = DB::table('atraksi_wisata')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);

        if ($affected) {
            return redirect()->route('atraksi-wisata.index')->with('success', 'Atraksi Wisata Berhasil Dihapus');
        }
            return redirect()->back()->with('error', 'Atraksi Wisata Gagal Dihapus');
    }

    public function editAtraksiWisata($id){
        $data = DB::table('atraksi_wisata')->get()
        ->where('id', $id)
        ->first();
        
        return view('admin.attraksi-wisata.edit', compact('data'));

    }

    public function CreateAtraksiWisata(Request $request){
        try {
        $request->validate([
            'namaAtraksi' => 'required',
            'deskripsiSingkat' => 'required',
            'isiAtraksi' => 'required',
            'tarif' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        ]);

        // Handle file upload
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images/atraksi-wisata'), $imageName);

        // Store the form input into the database
        $data = DB::table('atraksi_wisata')->insert([
            'namaAtraksi' => $request->namaAtraksi,
            'deskripsiSingkat' => $request->deskripsiSingkat,
            'isiAtraksi' => $request->isiAtraksi,
            'tarif' => $request->tarif,
            'lokasi' => $request->lokasi,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('atraksi-wisata.index')->with('success', 'Berhasil Menambahkan Atraksi Wisata.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Atraksi Wisata. Pastikan Tidak Ada Data Yang Kosong.');
        }

    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        
        return redirect()->back()->with('error', 'Gagal Menambahkan Atraksi Wisata. Periksa Kembali Data Masukan Anda.');
    }

    }

    public function updateAtraksiWisata(Request $request, $id){
        try {
            $request->validate([
                'namaAtraksi' => 'required',
                'deskripsiSingkat' => 'required',
                'isiAtraksi' => 'required',
                'tarif' => 'required',
                'lokasi' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $atraksi = DB::table('atraksi_wisata')->where('id', $id)->first();

            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/atraksi-wisata/' . $atraksi->gambar))) {
                    unlink(public_path('images/atraksi-wisata/' . $atraksi->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time().'.'.$request->gambar->extension();  
                $request->gambar->move(public_path('images/atraksi-wisata'), $imageName);
            } else {
                // Keep the existing image if there's no new image
                $imageName = $atraksi->gambar;
            }

            $data = DB::table('atraksi_wisata')
            ->where('id', $id)
            ->update([
                'namaAtraksi' => $request->namaAtraksi,
                'deskripsiSingkat' => $request->deskripsiSingkat,
                'isiAtraksi' => $request->isiAtraksi,
                'tarif' => $request->tarif,
                'lokasi' => $request->lokasi,
                'gambar' => $imageName,
            ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('atraksi-wisata.index')->with('success', 'Berhasil Mengubah Atraksi Wisata.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Atraksi Wisata. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Atraksi Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }
}
