<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminPenginapanController extends Controller
{
    public function AdminPenginapanView(){
        $data = DB::table('penginapan')->get()
        ->where('isDeleted', 0);

        return view('admin.fasilitas.penginapan.index', ['data' => $data]);
    }

    public function AdminPenginapanStore(){
        return view('admin.fasilitas.penginapan.store');
    }

    public function deletePenginapan($id){
        $affected = DB::table('penginapan')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);

        if ($affected) {
            return redirect()->route('admin.penginapan.index')->with('success', 'Fasilitas Penginapan Berhasil Dihapus');
        }
        else {
            return redirect()->back()->with('error', 'Fasilitas Penginapan Gagal Dihapus');
        }
    }

    public function editPenginapan($id){
        $data = DB::table('penginapan')->get()
        ->where('id', $id)
        ->first();

        return view('admin.fasilitas.penginapan.edit', compact('data'));
    }

    public function AdminPenginapanCreate(Request $request){
        try{
            $request->validate([
                'namaPenginapan' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'kontak' => 'required',
                'wifi' => 'required',
                'toilet' => 'required',
                'ac' => 'required',
                'breakfast' => 'required',
                'contactPerson' => 'required',
                'cleaningService' => 'required',
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
               $request->$gambarField->move(public_path('images/fasilitas/penginapan'), $imageName);
               // Add the image name to the array
               $imageNames[] = $imageName;
           } else {
               // If no file is uploaded, set the image name to null
               $imageNames[] = null;
           }
       }

        $data = DB::table('penginapan')->insert([
            'namaPenginapan' => $request->namaPenginapan,
            'id_fasilitas' => 1,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'wifi' => $request->wifi,
            'toilet' => $request->toilet,
            'ac' => $request->ac,
            'breakfast' => $request->breakfast,
            'contactPerson' => $request->contactPerson,
            'cleaningService' => $request->cleaningService,
            'gambar1' => $imageNames[0],
            'gambar2' => $imageNames[1],
            'gambar3' => $imageNames[2],
            'gambar4' => $imageNames[3],
            'gambar5' => $imageNames[4],
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.penginapan.index')->with('success', 'Berhasil Menambah Penginapan');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Penginapan. Pastikan Tidak Ada Data Yang Kosong.');
        }

        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Penginapan. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updatePenginapan(Request $request, $id){
        try {
            $request->validate([
                'namaPenginapan' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'kontak' => 'required',
                'wifi' => 'required',
                'toilet' => 'required',
                'ac' => 'required',
                'breakfast' => 'required',
                'contactPerson' => 'required',
                'cleaningService' => 'required',
                'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

           // Get the existing data
        $penginapan = DB::table('penginapan')->where('id', $id)->first();
        
        // Initialize an array to store the image names
        $imageNames = [];
            
        // Handle file upload for each image
        for ($i = 1; $i <= 5; $i++) {
            $gambarField = 'gambar' . $i;

            if ($request->hasFile($gambarField)) {
                // Delete the old image
                if (file_exists(public_path('images/fasilitas/penginapan/' . $penginapan->$gambarField))) {
                    unlink(public_path('images/fasilitas/penginapan/' . $penginapan->$gambarField));
                }

                // Move the new image to the appropriate directory
                $imageName = time() . '_' . $i . '.' . $request->$gambarField->extension();  
                $request->$gambarField->move(public_path('images/fasilitas/penginapan'), $imageName);

                // Add the image name to the array
                $imageNames[] = $imageName;
            } else {
                // Keep the existing image if there's no new image
                $imageNames[] = $penginapan->$gambarField;
            }
        }

            $data = DB::table('penginapan')
                ->where('id', $id)
                ->update([
                    'namaPenginapan' => $request->namaPenginapan,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'lokasi' => $request->lokasi,
                    'kontak' => $request->kontak,
                    'wifi' => $request->wifi,
                    'toilet' => $request->toilet,
                    'ac' => $request->ac,
                    'breakfast' => $request->breakfast,
                    'contactPerson' => $request->contactPerson,
                    'cleaningService' => $request->cleaningService,
                    'gambar1' => $imageNames[0],
                    'gambar2' => $imageNames[1],
                    'gambar3' => $imageNames[2],
                    'gambar4' => $imageNames[3],
                    'gambar5' => $imageNames[4],
                    ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('admin.penginapan.index')->with('success', 'Berhasil Mengubah Penginapan');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Penginapan. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Penginapan. Periksa Kembali Data Masukan Anda.');
        }
    }

}
