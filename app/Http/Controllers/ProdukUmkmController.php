<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukUmkmController extends Controller
{
    public function AdminUmkmMakananView(){
        $data = DB::table('produk_umkm')
    ->where('id_kategori_umkm', 1)
    ->where('isDeleted', 0)
    ->get();

        return view('admin.umkm.makanan.index',['data' => $data]);

    }

    public function AdminUmkmSovenirView(){
        $data = DB::table('produk_umkm')
        ->where('id_kategori_umkm', 2)
        ->where('isDeleted', 0)
        ->get();

        return view('admin.umkm.sovenir.index',['data' => $data]);
        
    }

    public function AdminUmkmPakaianView(){
        $data = DB::table('produk_umkm')
        ->where('id_kategori_umkm', 3)
        ->where('isDeleted', 0)
        ->get();

        return view('admin.umkm.pakaian.index',['data' => $data]);
    }

    public function AdminUmkmMakananStore(){
        return view('admin.umkm.makanan.store');

    }

    public function AdminUmkmSovenirStore(){
        return view('admin.umkm.sovenir.store');
        
    }

    public function AdminUmkmPakaianStore(){
        return view('admin.umkm.pakaian.store');
    }

    public function AdminUmkmMakananEdit($id){
        $data = DB::table('produk_umkm')->get()
        ->where('id', $id)
        ->first();

        return view('admin.umkm.makanan.edit', compact('data'));
    }

    public function AdminUmkmSovenirEdit($id){
        $data = DB::table('produk_umkm')->get()
        ->where('id', $id)
        ->first();

        return view('admin.umkm.sovenir.edit', compact('data'));
    }

    public function AdminUmkmPakaianEdit($id){
        $data = DB::table('produk_umkm')->get()
        ->where('id', $id)
        ->first();

        return view('admin.umkm.pakaian.edit', compact('data'));
    }

    public function AdminUmkmDelete($id){
        $affected = DB::table('produk_umkm')
        ->where('id', $id)
        ->update(['isDeleted' => 1]);
        if ($affected) {
            return redirect()->back()->with('success', 'Berhasil Menghapus Produk.');
        }
        return redirect()->with('error', 'Gagal Menghapus Produk.');
    }



    public function AdminUmkmMakananCreate(Request $request){
        try {
        $request->validate([
            'id_kategori_umkm' => 'required',
            'namaProduk' => 'required',
            'harga' => 'required',
            'namaQuantity' => 'required',
            'namaKontak' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        ]);

        // Handle file upload
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images/produk-umkm'), $imageName);

        $data = DB::table('produk_umkm')->insert([
            'id_kategori_umkm' => $request->id_kategori_umkm,
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
            'namaQuantity' => $request->namaQuantity,
            'kontak' => $request->kontak,
            'namaKontak' => $request->namaKontak,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.makanan.index')->with('success', 'Berhasil Menambahkan Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
    }
    }

    public function AdminUmkmSovenirCreate(Request $request){
        try {
            $request->validate([
                'id_kategori_umkm' => 'required',
                'namaProduk' => 'required',
                'harga' => 'required',
                'namaQuantity' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);
    
            // Handle file upload
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/produk-umkm'), $imageName);
    
            $data = DB::table('produk_umkm')->insert([
                'id_kategori_umkm' => $request->id_kategori_umkm,
                'namaProduk' => $request->namaProduk,
                'harga' => $request->harga,
                'namaQuantity' => $request->namaQuantity,
                'kontak' => $request->kontak,
                'namaKontak' => $request->namaKontak,
                'deskripsi' => $request->deskripsi,
                'gambar' => $imageName,
            ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.sovenir.index')->with('success', 'Berhasil Menambahkan Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
    }
    }

    public function AdminUmkmPakaianCreate(Request $request){
        try {
            $request->validate([
                'id_kategori_umkm' => 'required',
                'namaProduk' => 'required',
                'harga' => 'required',
                'namaQuantity' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);
    
            // Handle file upload
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/produk-umkm'), $imageName);
    
            $data = DB::table('produk_umkm')->insert([
                'id_kategori_umkm' => $request->id_kategori_umkm,
                'namaProduk' => $request->namaProduk,
                'harga' => $request->harga,
                'namaQuantity' => $request->namaQuantity,
                'kontak' => $request->kontak,
                'namaKontak' => $request->namaKontak,
                'deskripsi' => $request->deskripsi,
                'gambar' => $imageName,
            ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.pakaian.index')->with('success', 'Berhasil Menambahkan Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Menambahkan Produk. Periksa Kembali Masukan Anda.');
    }
    }

    // Update

    public function AdminUmkmMakananUpdate(Request $request, $id){
        try{
            $request->validate([
                'id_kategori_umkm' => 'required',
                'namaProduk' => 'required',
                'harga' => 'required',
                'namaQuantity' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        // Get the existing data
        $umkm = DB::table('produk_umkm')->where('id', $id)->first();

        // Handle file upload if there's a new image
        if ($request->hasFile('gambar')) {
            // Delete the old image
            if (file_exists(public_path('images/produk-umkm/' . $umkm->gambar))) {
                unlink(public_path('images/produk-umkm/' . $umkm->gambar));
            }
            // Move the new image to the appropriate directory
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/produk-umkm'), $imageName);
        } else {
            // Keep the existing image if there's no new image
            $imageName = $umkm->gambar;
        }

        $data = DB::table('produk_umkm')
            ->where('id', $id)
            ->update([
            'id_kategori_umkm' => $request->id_kategori_umkm,
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
            'namaQuantity' => $request->namaQuantity,
            'namaKontak' => $request->namaKontak,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.makanan.index')->with('success', 'Berhasil Mengubah Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
    }

    }

    public function AdminUmkmSovenirUpdate(Request $request, $id){
        try{
            $request->validate([
                'id_kategori_umkm' => 'required',
                'namaProduk' => 'required',
                'harga' => 'required',
                'namaQuantity' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        // Get the existing data
        $umkm = DB::table('produk_umkm')->where('id', $id)->first();

        // Handle file upload if there's a new image
        if ($request->hasFile('gambar')) {
            // Delete the old image
            if (file_exists(public_path('images/produk-umkm/' . $umkm->gambar))) {
                unlink(public_path('images/produk-umkm/' . $umkm->gambar));
            }
            // Move the new image to the appropriate directory
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/produk-umkm'), $imageName);
        } else {
            // Keep the existing image if there's no new image
            $imageName = $umkm->gambar;
        }

        $data = DB::table('produk_umkm')
            ->where('id', $id)
            ->update([
            'id_kategori_umkm' => $request->id_kategori_umkm,
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
            'namaQuantity' => $request->namaQuantity,
            'namaKontak' => $request->namaKontak,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);
        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.sovenir.index')->with('success', 'Berhasil Mengubah Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
    }

    }

    public function AdminUmkmPakaianUpdate(Request $request, $id){
        try{
            $request->validate([
                'id_kategori_umkm' => 'required',
                'namaProduk' => 'required',
                'harga' => 'required',
                'namaQuantity' => 'required',
                'namaKontak' => 'required',
                'kontak' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
            ]);

        // Get the existing data
        $umkm = DB::table('produk_umkm')->where('id', $id)->first();

        // Handle file upload if there's a new image
        if ($request->hasFile('gambar')) {
            // Delete the old image
            if (file_exists(public_path('images/produk-umkm/' . $umkm->gambar))) {
                unlink(public_path('images/produk-umkm/' . $umkm->gambar));
            }
            // Move the new image to the appropriate directory
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/produk-umkm'), $imageName);
        } else {
            // Keep the existing image if there's no new image
            $imageName = $umkm->gambar;
        }

        $data = DB::table('produk_umkm')
            ->where('id', $id)
            ->update([
            'id_kategori_umkm' => $request->id_kategori_umkm,
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
            'namaQuantity' => $request->namaQuantity,
            'namaKontak' => $request->namaKontak,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        if ($data) {
            // If insertion is successful, redirect with success message
            return redirect()->route('admin.umkm.pakaian.index')->with('success', 'Berhasil Mengubah Produk.');
        } else {
            // If insertion fails, redirect back with error message
            return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
        }
    } catch (\Exception $e) {
        // Exception occurred, redirect back with error message
        return redirect()->back()->with('error', 'Gagal Mengubah Produk. Periksa Kembali Masukan Anda.');
    }

    }


}
