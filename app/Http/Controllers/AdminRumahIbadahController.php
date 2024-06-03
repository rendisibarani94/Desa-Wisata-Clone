<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRumahIbadahController extends Controller
{
    public function AdminRumahIbadahView(){
        $data = DB::table('rumah_ibadah')->get()
        ->where('isDeleted', 0);
        return view('admin.fasilitas.rumah-ibadah.index', ['data' => $data]);
    }

    public function AdminRumahIbadahStore(){
        return view('admin.fasilitas.rumah-ibadah.store');
    }

    public function deleteRumahIbadah($id){
        $affected = DB::table('rumah_ibadah')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);
        if ($affected) {
            return redirect()->route('admin.rumahIbadah.index')->with('success', 'Fasilitas Rumah Ibadah Berhasil Dihapus');
        }
        else {
            return redirect()->back()->with('error', 'Fasilitas Rumah Ibadah Gagal Dihapus');
        }
    }

    public function editRumahIbadah($id){
        $data = DB::table('rumah_ibadah')->get()
        ->where('id', $id)
        ->first();

        return view('admin.fasilitas.rumah-ibadah.edit', compact('data'));
    }

    public function AdminRumahIbadahCreates(Request $request){
        try{
            $request->validate([
                'namaRumahIbadah' => 'required',
                'lokasi' => 'required',
                'jadwalIbadah' => 'required',
                'deskripsi' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images/fasilitas/rumah-ibadah'), $imageName);

        $data = DB::table('rumah_ibadah')->insert([
            'namaRumahIbadah' => $request->namaRumahIbadah,
            'lokasi' => $request->lokasi,
            'jadwalIbadah' => $request->jadwalIbadah,
            'deskripsi' => $request->deskripsi,
            'isiKonten' => $request->isiKonten,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.rumahIbadah.index')->with('success', 'Berhasil Menambah Rumah Ibadah');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Rumah Ibadah. Pastikan Tidak Ada Data  Yang Kosong.');
        }

        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Rumah Ibadah. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updateRumahIbadah(Request $request, $id){
        try {
            $request->validate([
                'namaRumahIbadah' => 'required',
                'lokasi' => 'required',
                'jadwalIbadah' => 'required',
                'deskripsi' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $rumah = DB::table('rumah_ibadah')->where('id', $id)->first();
            
            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/fasilitas/rumah-ibadah/' . $rumah->gambar))) {
                    unlink(public_path('images/fasilitas/rumah-ibadah/' . $rumah->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time().'.'.$request->gambar->extension();  
                $request->gambar->move(public_path('images/fasilitas/rumah-ibadah'), $imageName);

            } else {
                // Keep the existing image if there's no new image
                $imageName = $rumah->gambar;
            }

            $data = DB::table('rumah_ibadah')
                ->where('id', $id)
                ->update([
                    'namaRumahIbadah' => $request->namaRumahIbadah,
                    'lokasi' => $request->lokasi,
                    'jadwalIbadah' => $request->jadwalIbadah,
                    'deskripsi' => $request->deskripsi,
                    'isiKonten' => $request->isiKonten,
                    'gambar' => $imageName,
            ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('admin.rumahIbadah.index')->with('success', 'Berhasil Menambah Rumah Ibadah');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Rumah Ibadah. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Rumah Ibadah. Periksa Kembali Data Masukan Anda.');
        }
    }
}
