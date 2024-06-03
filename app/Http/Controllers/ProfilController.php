<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfilController extends Controller
{
    public function index()
    {
        $data = DB::table('profil')
            ->first();

        $datas = DB::table('berita_wisata')
            ->where('isDeleted', 0)
            ->inRandomOrder()
            ->take(3)
            ->get();

            $datas->transform(function ($item) {
                $item->formatted_date = Carbon::parse($item->tanggalBerita)->translatedFormat('l, d F Y');
                return $item;
            });

        return view('user.profil.index', compact('data', 'datas'));
    }

    public function adminView()
    {
        $data = DB::table('profil')
            ->get()
            ->first();

        return view('admin.profil.index', compact('data'));
    }

    public function adminStore()
    {
        return view('admin.profil.store');
    }

    public function editProfil($id)
    {
        $data = DB::table('profil')
            ->first();

        return view('admin.profil.edit', compact('data'));
    }


    public function createProfil(Request $request)
    {
        try {
            $request->validate([
                'deskripsi' => 'required',
                'sejarah' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/profil'), $imageName);

            $data = DB::table('profil')->insert([
                'deskripsi' => $request->deskripsi,
                'sejarah' => $request->sejarah,
                'gambar' => $imageName,
            ]);

            if ($data) {
                // Trigger success Sweet Alert and redirect
                // Alert::success('Success', 'Destination stored successfully!')->persistent(true);
                return redirect()->route('admin.profil')->with('success', 'Berhasil Menambah Profil Desa Wisata.');;
            } else {
                // Handle if update fails
                // Alert::error('Error', 'Failed to update destination.')->persistent(true);
                return redirect()->back()->with('error', 'Gagal Menambah Profil Desa Wisata. Periksa Kembali Masukan Anda.');
            }
        } catch (\Exception $e) {
            // Exception occurred, handle error with Sweet Alert
            // Alert::error('Error', $e->getMessage())->persistent(true);
            return redirect()->back()->with('error', 'Gagal Menambah Profil Desa Wisata. Periksa Kembali Masukan Anda.');
        }
    }

    public function updateProfil(Request $request, $id)
    {
        try {
            $request->validate([
                'deskripsi' => 'required',
                'sejarah' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

            // Get the existing data
            $profil = DB::table('profil')->where('id', $id)->first();

            // Handle file upload if there's a new image
            if ($request->hasFile('gambar')) {
                // Delete the old image
                if (file_exists(public_path('images/profil/' . $profil->gambar))) {
                    unlink(public_path('images/profil/' . $profil->gambar));
                }
                // Move the new image to the appropriate directory
                $imageName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('images/profil'), $imageName);
            } else {
                // Keep the existing image if there's no new image
                $imageName = $profil->gambar;
            }

            $data = DB::table('profil')
                ->where('id', $id)
                ->update([
                    'deskripsi' => $request->deskripsi,
                    'sejarah' => $request->sejarah,
                    'gambar' => $imageName,
                ]);

            if ($data) {
                // If insertion is successful, redirect with success message
                return redirect()->route('admin.profil')->with('success', 'Berhasil Mengubah Profil Desa Wisata.');
            } else {
                // If insertion fails, redirect back with error message
                return redirect()->back()->with('error', 'Gagal Mengubah Profil Desa Wisata. Periksa Kembali Masukan Anda.');
            }
        } catch (\Exception $e) {
            // Exception occurred, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Profil Desa Wisata. Periksa Kembali Masukan Anda.');
        }
    }
}
