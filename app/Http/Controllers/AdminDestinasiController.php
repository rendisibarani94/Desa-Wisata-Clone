<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDestinasiController extends Controller
{
    public function AdminDestinationView(){
        $data = DB::table('objek_wisata')->get()
        ->where('statusDelete', 0);

        //     $data = DB::table('objek_wisata')
        // ->join('kategori_objek_wisata', 'objek_wisata.idKategoriWisata', '=', 'kategori_objek_wisata.id')
        // ->select('objek_wisata.*', 'kategori_objek_wisata.nama as kategori')
        // ->where('objek_wisata.statusDelete', 0)
        // ->get();
        
        return view('admin.destinasi.index', ['data' => $data]);
    }

    public function AdminDestinationStore(){
        return view('admin.destinasi.store');
    }

    public function softDelete($id){
    $affected = DB::table('objek_wisata')
                  ->where('id', $id)
                  ->update(['statusDelete' => 1]);

    if ($affected) {
        return redirect()->route('AdminDestinationView')->with('success', 'Objek Wisata Berhasil Dihapus');
    }
    else{
        return redirect()->back()->with('error', 'Objek Wisata Gagal Berhasil Dihapus');
    }
}

    public function edit($id){
        $destinasi = DB::table('objek_wisata')
        ->where('id', $id)
        ->first();
    return view('admin.destinasi.edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
    {
        try {
        $request->validate([
            'idKategoriWisata' => 'required',
            'namaObjekWisata' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'jamBuka' => 'required',
            'jamTutup' => 'required',
            'waktuOperasi' => 'required',
            'kontak' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Get the existing data
        $wisata = DB::table('objek_wisata')->where('id', $id)->first();
            
        // Handle file upload if there's a new image
        if ($request->hasFile('gambar')) {
            // Delete the old image
            if (file_exists(public_path('images/objek-wisata/' . $wisata->gambar))) {
                unlink(public_path('images/objek-wisata/' . $wisata->gambar));
            }
            // Move the new image to the appropriate directory
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/objek-wisata'), $imageName);

        } else {
            // Keep the existing image if there's no new image
            $imageName = $wisata->gambar;
        }

        $data = DB::table('objek_wisata')
            ->where('id', $id)
            ->update([
                'idKategoriWisata' => $request->idKategoriWisata,
                'namaObjekWisata' => $request->namaObjekWisata,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'jamBuka' => $request->jamBuka,
                'jamTutup' => $request->jamTutup,
                'waktuOperasi' => $request->waktuOperasi,
                'kontak' => $request->kontak,
                'gambar' => $imageName,
            ]);
    
            if($data){
                // Trigger success Sweet Alert and redirect
                // Alert::success('Success', 'Destination updated successfully!')->persistent(true);
                return redirect()->route('AdminDestinationView')->with('success', 'Berhasil Mengubah Objek Wisata.');
            } else {
                // Handle if update fails
                // Alert::error('Error', 'Failed to update destination.')->persistent(true);
                return redirect()->back()->with('error', 'Gagal Mengubah Objek Wisata. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, handle error with Sweet Alert
            // Alert::error('Error', $e->getMessage())->persistent(true);
            return redirect()->back()->with('error', 'Gagal Mengubah Objek Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }



    // Fungsi Tambah
    public function StoreDestination(Request $request){
        try {
            $request->validate([
                'idKategoriWisata' => 'required',
                'namaObjekWisata' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'waktuOperasi' => 'required',
                'kontak' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);
    
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/objek-wisata'), $imageName);
    
            $data = DB::table('objek_wisata')->insert([
                'idKategoriWisata' => $request->idKategoriWisata,
                'namaObjekWisata' => $request->namaObjekWisata,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'jamBuka' => $request->jamBuka,
                'jamTutup' => $request->jamTutup,
                'waktuOperasi' => $request->waktuOperasi,
                'kontak' => $request->kontak,
                'gambar' => $imageName,
            ]);
    
            if($data){
                // Trigger success Sweet Alert and redirect
                // Alert::success('Success', 'Destination stored successfully!')->persistent(true);
                return redirect()->route('AdminDestinationView')->with('success', 'Berhasil Menambah Objek Wisata.');
            } else {
                // Handle if update fails
                // Alert::error('Error', 'Failed to update destination.')->persistent(true);
                return redirect()->back()->with('error', 'Gagal Menambahkan Objek Wisata. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, handle error with Sweet Alert
            // Alert::error('Error', $e->getMessage())->persistent(true);
            return redirect()->back()->with('error', 'Gagal Menambahkan Objek Wisata. Periksa Kembali Data Masukan Anda.');
        }
    }
    
}
