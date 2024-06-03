<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPaketWisataController extends Controller
{
    public function AdminPaketWisataView(){
        $data = DB::table('paket_wisata')->get()
        ->where('isDeleted', 0);

        return view('admin.paket-wisata.index', ['data' => $data]);
    }

    public function AdminPaketWisataStore(){
        return view('admin.paket-wisata.store');
    }

    public function deletePaketWisata($id){
        $affected = DB::table('paket_wisata')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);

        if ($affected) {
            return redirect()->route('admin.paketWisata.index')->with('success', 'Paket Wisata Berhasil Dihapus');
        }
        else {
            return redirect()->back()->with('error', 'Paket Wisata Gagal Dihapus');
        }
    }

    public function editPaketWisata($id){
        $data = DB::table('paket_wisata')->get()
        ->where('id', $id)
        ->first();

        return view('admin.paket-wisata.edit', compact('data'));
    }

    public function AdminPaketWisataCreate(Request $request){
        try{
            $request->validate([
                'namaPaket' => 'required',
                'harga' => 'required',
                'durasi' => 'required',
                'lokasi' => 'required',
                'waktuTersedia' => 'required',
                'deskripsi' => 'required',
                'rute' => 'required',
                'akomodasi' => 'required',
                'syaratKetentuan' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

       // Initialize an array to store the image names
       $imageNames = [];

       // Handle file upload for each image
       for ($i = 1; $i <= 5; $i++) {
           $gambarField = 'gambar' . $i;
           if ($request->hasFile($gambarField)) {
               // Move the new image to the appropriate directory
               $imageName = time() . '_' . $i . '.' . $request->$gambarField->extension();
               $request->$gambarField->move(public_path('images/paket-wisata'), $imageName);
               // Add the image name to the array
               $imageNames[] = $imageName;
           } else {
               // If no file is uploaded, set the image name to null
               $imageNames[] = null;
           }
       }

        $data = DB::table('paket_wisata')->insert([
            'namaPaket' => $request->namaPaket,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'lokasi' => $request->lokasi,
            'waktuTersedia' => $request->waktuTersedia,
            'deskripsi' => $request->deskripsi,
            'rute' => $request->rute,
            'akomodasi' => $request->akomodasi,
            'syaratKetentuan' => $request->syaratKetentuan,
            'namaKontak' => $request->namaKontak,
            'kontak' => $request->kontak,
            'gambar1' => $imageNames[0],
            'gambar2' => $imageNames[1],
            'gambar3' => $imageNames[2],
            'gambar4' => $imageNames[3],
            'gambar5' => $imageNames[4],
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.paketWisata.index')->with('success', 'Berhasil Menambah Paket Wisata');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Paket Wisata. Pastikan Tidak Ada Data Yang Kosong.');
        }

        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Paket Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updatePaketWisata(Request $request, $id){
        try {
            $request->validate([
                'namaPaket' => 'required',
                'harga' => 'required',
                'durasi' => 'required',
                'lokasi' => 'required',
                'waktuTersedia' => 'required',
                'deskripsi' => 'required',
                'rute' => 'required',
                'akomodasi' => 'required',
                'syaratKetentuan' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

           // Get the existing data
        $paket = DB::table('paket_wisata')->where('id', $id)->first();
        
        // Initialize an array to store the image names
        $imageNames = [];
            
        // Handle file upload for each image
        for ($i = 1; $i <= 5; $i++) {
            $gambarField = 'gambar' . $i;

            if ($request->hasFile($gambarField)) {
                // Delete the old image
                if (file_exists(public_path('images/paket-wisata/' . $paket->$gambarField))) {
                    unlink(public_path('images/paket-wisata/' . $paket->$gambarField));
                }

                // Move the new image to the appropriate directory
                $imageName = time() . '_' . $i . '.' . $request->$gambarField->extension();  
                $request->$gambarField->move(public_path('images/paket-wisata'), $imageName);

                // Add the image name to the array
                $imageNames[] = $imageName;
            } else {
                // Keep the existing image if there's no new image
                $imageNames[] = $paket->$gambarField;
            }
        }

            $data = DB::table('paket_wisata')
                ->where('id', $id)
                ->update([
                    'namaPaket' => $request->namaPaket,
                    'harga' => $request->harga,
                    'durasi' => $request->durasi,
                    'lokasi' => $request->lokasi,
                    'waktuTersedia' => $request->waktuTersedia,
                    'deskripsi' => $request->deskripsi,
                    'rute' => $request->rute,
                    'akomodasi' => $request->akomodasi,
                    'syaratKetentuan' => $request->syaratKetentuan,
                    'namaKontak' => $request->namaKontak,
                    'gambar1' => $imageNames[0],
                    'gambar2' => $imageNames[1],
                    'gambar3' => $imageNames[2],
                    'gambar4' => $imageNames[3],
                    'gambar5' => $imageNames[4],
                    ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('admin.paketWisata.index')->with('success', 'Berhasil Mengubah Paket Wisata');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Paket Wisata. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Paket Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }

}
