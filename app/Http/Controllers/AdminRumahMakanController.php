<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRumahMakanController extends Controller
{
    public function AdminRumahMakanView(){
        $data = DB::table('rumah_makan')->get()
        ->where('isDeleted', 0);
        return view('admin.fasilitas.rumah-makan.index', ['data' => $data]);
    }

    public function AdminRumahMakanStore(){
        return view('admin.fasilitas.rumah-makan.store');
    }

    public function deleteRumahMakan($id){
        $affected = DB::table('rumah_makan')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);
        if ($affected) {
            return redirect()->route('admin.rumahMakan.index')->with('success', 'Fasilitas Rumah Makan Berhasil Dihapus');
        }
        else {
            return redirect()->back()->with('error', 'Fasilitas Rumah Makan Gagal Dihapus');
        }
    }

    public function editRumahMakan($id){
        $data = DB::table('rumah_makan')->get()
        ->where('id', $id)
        ->first();

        return view('admin.fasilitas.rumah-makan.edit', compact('data'));
    }

    public function AdminRumahMakanCreates(Request $request){
        try{
            $request->validate([
                'namaRumahMakan' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images/fasilitas/rumah-makan'), $imageName);

        $data = DB::table('rumah_makan')->insert([
            'namaRumahMakan' => $request->namaRumahMakan,
            'lokasi' => $request->lokasi,
            'waktuOperasi' => $request->waktuOperasi,
            'jamBuka' => $request->jamBuka,
            'jamTutup' => $request->jamTutup,
            'deskripsi' => $request->deskripsi,
            'isiKonten' => $request->isiKonten,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.rumahMakan.index')->with('success', 'Berhasil Menambah Rumah Makan');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Rumah Makan. Pastikan Tidak Ada Data Yang Kosong.');
        }

        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Rumah Makan. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updateRumahMakan(Request $request, $id){
        try {
            $request->validate([
                'namaRumahMakan' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $ruma = DB::table('rumah_makan')->where('id', $id)->first();
            
            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/fasilitas/rumah-makan/' . $ruma->gambar))) {
                    unlink(public_path('images/fasilitas/rumah-makan/' . $ruma->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time().'.'.$request->gambar->extension();  
                $request->gambar->move(public_path('images/fasilitas/rumah-makan'), $imageName);

            } else {
                // Keep the existing image if there's no new image
                $imageName = $ruma->gambar;
            }

            $data = DB::table('rumah_makan')
                ->where('id', $id)
                ->update([
                    'namaRumahMakan' => $request->namaRumahMakan,
                    'lokasi' => $request->lokasi,
                    'deskripsi' => $request->deskripsi,
                    'waktuOperasi' => $request->waktuOperasi,
                    'jamBuka' => $request->jamBuka,
                    'jamTutup' => $request->jamTutup,
                    'isiKonten' => $request->isiKonten,
                    'gambar' => $imageName,
            ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('admin.rumahMakan.index')->with('success', 'Berhasil Mengubah Rumah Makan');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Rumah Makan. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Rumah Makan. Periksa Kembali Data Masukan Anda.');
        }
    }
}
