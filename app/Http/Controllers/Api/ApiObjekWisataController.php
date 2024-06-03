<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter; // Ensure you have this helper or create it as per your needs
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; // Ensure to extend the base Controller

class ApiObjekWisataController extends Controller
{
    public function AllObjekWisata()
    {
        try {
            $data = DB::table('objek_wisata')
            ->get()
            ->where('statusDelete', 0)
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/objek-wisata/'. $item->gambar;
                    
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

    public function DetailObjekWisata($id)
    {

        try {
            $data = DB::table('objek_wisata')
        ->join('kategori_objek_wisata', 'objek_wisata.idKategoriWisata', '=', 'kategori_objek_wisata.id')
        ->select('objek_wisata.*', 'kategori_objek_wisata.nama as kategori')
        ->where('objek_wisata.statusDelete', 0)
        ->where('objek_wisata.id', $id)
        ->get()
        ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/objek-wisata/'. $item->gambar;
                    
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
