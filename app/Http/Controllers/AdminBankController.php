<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBankController extends Controller
{
    public function AdminBankView(){
        $data = DB::table('bank')
        ->get()
        ->where('isDeleted', 0);
        return view('admin.fasilitas.bank.index', ['data' => $data]);
    }

    public function AdminBankStore(){
        return view('admin.fasilitas.bank.store');
    }

    public function deleteBank($id){
        $affected = DB::table('bank')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);
        if ($affected) {
            return redirect()->route('admin.bank.index')->with('success', 'Fasilitas Bank Berhasil Dihapus');
        }
        else {
            return redirect()->back()->with('error', 'Fasilitas Bank Gagal Dihapus');
        }
    }

    public function editBank($id){
        $data = DB::table('bank')->get()
        ->where('id', $id)
        ->first();

        return view('admin.fasilitas.bank.edit', compact('data'));
    }

    public function AdminBankCreates(Request $request){
        try{
            $request->validate([
                'namaBank' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images/fasilitas/bank'), $imageName);

        $data = DB::table('bank')->insert([
            'namaBank' => $request->namaBank,
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
            return redirect()->route('admin.bank.index')->with('success', 'Berhasil Menambahkan Fasilitas Bank.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Fasilitas Bank. Pastikan Tidak Ada Data Yang Kosong.');
        }

        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Fasilitas Bank. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updateBank(Request $request, $id){
        try {
            $request->validate([
                'namaBank' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $bank = DB::table('bank')->where('id', $id)->first();
            
            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/fasilitas/bank/' . $bank->gambar))) {
                    unlink(public_path('images/fasilitas/bank/' . $bank->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time().'.'.$request->gambar->extension();  
                $request->gambar->move(public_path('images/fasilitas/bank'), $imageName);

            } else {
                // Keep the existing image if there's no new image
                $imageName = $bank->gambar;
            }

            $data = DB::table('bank')
                ->where('id', $id)
                ->update([
                    'namaBank' => $request->namaBank,
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
                return redirect()->route('admin.bank.index')->with('success', 'Berhasil Mengubah Fasilitas Bank.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Fasilitas Bank. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Fasilitas Bank. Periksa Kembali Data Masukan Anda.');
        }
    }
}
