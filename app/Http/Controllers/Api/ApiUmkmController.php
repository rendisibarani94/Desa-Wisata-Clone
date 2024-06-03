<?php


namespace App\Http\Controllers\Api;


use App\Helpers\ApiFormatter; // Ensure you have this helper or create it as per your needs
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 
class ApiUmkmController extends Controller
{
    public function AllUmkm(){
        try {
            $data = DB::table('produk_umkm')
            ->where('isDeleted', 0)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/produk-umkm/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "No Data Found");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function AllMakanan(){
        try {
            $data = DB::table('produk_umkm')
            ->where('isDeleted', 0)
            ->where('id_kategori_umkm', 1)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/produk-umkm/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "No Data Found");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function AllSouvenir(){
        try {
            $data = DB::table('produk_umkm')
            ->where('isDeleted', 0)
            ->where('id_kategori_umkm', 2)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/produk-umkm/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "No Data Found");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function AllPakaian(){
        try {
            $data = DB::table('produk_umkm')
            ->where('isDeleted', 0)
            ->where('id_kategori_umkm', 3)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/produk-umkm/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "No Data Found");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }
    
    public function Detailproduk($id){
        try {
            $data = DB::table('produk_umkm')
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/produk-umkm/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "No Data Found");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }
}
