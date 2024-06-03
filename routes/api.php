<?php

use App\Http\Controllers\Api\ApiObjekWisataController; // Correct namespace
use App\Http\Controllers\Api\ApiFasilitasController;
use App\Http\Controllers\Api\ApiUmkmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ObjekWisata', [ApiObjekWisataController::class, 'AllObjekWisata']);
Route::get('/ObjekWisata/{id}', [ApiObjekWisataController::class, 'DetailObjekWisata']);

Route::prefix('fasilitas')->group(function(){
    // homestay
    Route::get('/homestay', [ApiFasilitasController::class, 'AllHomestay']);
    Route::get('/homestay/{id}', [ApiFasilitasController::class, 'DetailHomestay']);

    // faslitas kesehatan
    Route::get('/fasilitas-kesehatan', [ApiFasilitasController::class, 'AllFasilitasKesehatan']);
    Route::get('/fasilitas-kesehatan/{id}', [ApiFasilitasController::class, 'DetailFasilitasKesehatan']);

    // rumah makan
    Route::get('/rumah-makan', [ApiFasilitasController::class, 'AllRumahMakan']);
    Route::get('/rumah-makan/{id}', [ApiFasilitasController::class, 'DetailRumahMakan']);

    // bank
    Route::get('/bank', [ApiFasilitasController::class, 'AllBank']);
    Route::get('/bank/{id}', [ApiFasilitasController::class, 'DetailBank']);

    // rumah ibadah
    Route::get('/rumah-ibadah', [ApiFasilitasController::class, 'AllRumahIbadah']);
    Route::get('/rumah-ibadah/{id}', [ApiFasilitasController::class, 'DetailRumahIbadah']);
});


Route::prefix('umkm')->group(function(){

    Route::get('/', [ApiUmkmController::class, 'AllUmkm']);


    Route::get('/makanan', [ApiUmkmController::class, 'AllMakanan']);
    Route::get('/souvenir', [ApiUmkmController::class, 'AllSouvenir']);
    Route::get('/pakaian', [ApiUmkmController::class, 'AllPakaian']);



    Route::get('/produk/{id}', [ApiUmkmController::class, 'Detailproduk']);

});

