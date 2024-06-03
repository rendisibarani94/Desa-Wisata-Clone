<?php

namespace App\Http\Controllers\Api;


use App\Helpers\ApiFormatter; // Ensure you have this helper or create it as per your needs
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 

class ApiFasilitasController extends Controller
{
    public function AllHomestay() {
        try {
            $data = DB::table('penginapan')
            ->get()
            ->where('isDeleted', 0)
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);
                    $item->lokasi = strip_tags($item->lokasi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar1 = config('app.url'). '/images/fasilitas/penginapan'. $item->gambar1;
                    $item->gambar2 = config('app.url'). '/images/fasilitas/penginapan'. $item->gambar2;
                    $item->gambar3 = config('app.url'). '/images/fasilitas/penginapan'. $item->gambar3;
                    $item->gambar4 = config('app.url'). '/images/fasilitas/penginapan'. $item->gambar4;
                    $item->gambar5 = config('app.url'). '/images/fasilitas/penginapan'. $item->gambar5;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function DetailHomestay($id){
        try {
            $data = DB::table('penginapan')
            ->get()
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->deskripsi = strip_tags($item->deskripsi);
                    $item->lokasi = strip_tags($item->lokasi);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar1 = config('app.url'). '/images/fasilitas/penginapan/'. $item->gambar1;
                    $item->gambar2 = config('app.url'). '/images/fasilitas/penginapan/'. $item->gambar2;
                    $item->gambar3 = config('app.url'). '/images/fasilitas/penginapan/'. $item->gambar3;
                    $item->gambar4 = config('app.url'). '/images/fasilitas/penginapan/'. $item->gambar4;
                    $item->gambar5 = config('app.url'). '/images/fasilitas/penginapan/'. $item->gambar5;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }


    public function AllFasilitasKesehatan() {
        try {
            $data = DB::table('fasilitas_kesehatan')
            ->where('isDeleted', 0)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/fasilitas-kesehatan/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function DetailFasilitasKesehatan($id){
        try {
            $data = DB::table('fasilitas_kesehatan')
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/fasilitas-kesehatan/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }



    public function AllRumahMakan() {
        try {
            $data = DB::table('rumah_makan')
            ->where('isDeleted', 0)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/rumah-makan/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function DetailRumahMakan($id){
        try {
            $data = DB::table('rumah_makan')
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/rumah-makan/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }



    public function AllBank() {
        try {
            $data = DB::table('bank')
            ->where('isDeleted', 0)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/bank/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function DetailBank($id){
        try {
            $data = DB::table('bank')
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/bank/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }



    public function AllRumahIbadah() {
        try {
            $data = DB::table('rumah_ibadah')
            ->where('isDeleted', 0)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);

                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/rumah-ibadah/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

    public function DetailRumahIbadah($id){
        try {
            $data = DB::table('rumah_ibadah')
            ->where('isDeleted', 0)
            ->where('id', $id)
            ->get()
            ->map(function ($item) {
                    // Convert isiKonten to plain text
                    $item->isiKonten = strip_tags($item->isiKonten);
                    $item->jadwalIbadah = strip_tags($item->jadwalIbadah);
                    
                    // Prepend APP_URL to gambar
                    // $item->gambar = url('/images/objek-wisata/'.$item->gambar);
                    $item->gambar = config('app.url'). '/images/fasilitas/rumah-ibadah/'. $item->gambar;
                    
                    return $item;
                });

            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, "Success", $data);
            } else {
                return ApiFormatter::createApi(400, "Data Yang Di Cari Tidak Ditemukan");
            }
        } catch (\Exception $e) {
            return ApiFormatter::createApi(500, $e->getMessage(), null,);
        }
    }

}
