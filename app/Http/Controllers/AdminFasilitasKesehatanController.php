<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFasilitasKesehatanController extends Controller
{
    public function AdminFasilitasKesehatanView()
    {
        $data = DB::table('fasilitas_kesehatan')->get()
            ->where('isDeleted', 0);

        return view('admin.fasilitas.fasilitas-kesehatan.index', ['data' => $data]);
    }

    public function AdminFasilitasKesehatanStore()
    {
        return view('admin.fasilitas.fasilitas-kesehatan.store');
    }

    public function deleteFasilitasKesehatan($id)
    {
        $affected = DB::table('fasilitas_kesehatan')
            ->where('id', $id)
            ->update(['isDeleted' => 1]);
        if ($affected) {
            return redirect()->route('fasilitas-kesehatan.index')->with('success', 'Fasilitas Kesehatan Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Fasilitas Kesehatan Gagal Dihapus');
        }
    }

    public function editFasilitasKesehatan($id)
    {
        $data = DB::table('fasilitas_kesehatan')->get()
            ->where('id', $id)
            ->first();

        return view('admin.fasilitas.fasilitas-kesehatan.edit', compact('data'));
    }

    public function AdminFasilitasKesehatanCreate(Request $request)
    {
        try {
            $request->validate([
                'namaFasilitasKesehatan' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Handle file upload
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/fasilitas/fasilitas-kesehatan'), $imageName);

            $data = DB::table('fasilitas_kesehatan')->insert([
                'namaFasilitasKesehatan' => $request->namaFasilitasKesehatan,
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
                return redirect()->route('fasilitas-kesehatan.index')->with('success', 'Berhasil Menambah Fasilitas Kesehatan.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Menambahkan Fasilitas Kesehatan. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Fasilitas Kesehatan. Periksa Kembali Data Masukan Anda.');
        }
    }

    public function updateFasilitasKesehatan(Request $request, $id)
    {
        try {
            $request->validate([
                'namaFasilitasKesehatan' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'waktuOperasi' => 'required',
                'jamBuka' => 'required',
                'jamTutup' => 'required',
                'isiKonten' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $faskes = DB::table('fasilitas_kesehatan')->where('id', $id)->first();

            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/fasilitas/fasilitas-kesehatan/' . $faskes->gambar))) {
                    unlink(public_path('images/fasilitas/fasilitas-kesehatan/' . $faskes->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('images/fasilitas/fasilitas-kesehatan'), $imageName);
            } else {
                // Keep the existing image if there's no new image
                $imageName = $faskes->gambar;
            }

            $data = DB::table('fasilitas_kesehatan')
                ->where('id', $id)
                ->update([
                    'namaFasilitasKesehatan' => $request->namaFasilitasKesehatan,
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
                return redirect()->route('fasilitas-kesehatan.index')->with('success', 'Berhasil Mengubah fasilitas Kesehatan.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Fasilitas Kesehatan. Pastikan Tidak Ada Data Yang Kosong.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Fasilitas Kesehatan. Periksa Kembali Data Masukan Anda.');
        }
    }
}
