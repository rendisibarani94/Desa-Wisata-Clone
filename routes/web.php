<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//beranda
Route::get('/', [App\Http\Controllers\BerandaControlller::class, 'index'])->name('beranda.index');

//profil
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');

//Route Berita Wisata
Route::get('/beritaWisata', [App\Http\Controllers\BeritaWisataController::class, 'index'])->name('beritaWisata.index');
Route::get('/beritaWisata/{id}/detail', [App\Http\Controllers\BeritaWisataController::class, 'detail'])->name('beritaWisata.detail');

//Route Atraksi Wisata
Route::get('/atraksi-wisata/{id}/detail', [App\Http\Controllers\AtraksiWisataController::class, 'detail'])->name('atraksiWisata.detail');
Route::get('/atraksi-wisata', [App\Http\Controllers\AtraksiWisataController::class, 'index'])->name('atraksiWisata.index');

//Route Objek Wisata
Route::get('/objek-wisata', [App\Http\Controllers\ObjekWisataController::class, 'index'])->name('objek-wisata.index');
Route::get('/objek-wisata/{id}/detail', [App\Http\Controllers\ObjekWisataController::class, 'detail'])->name('objek-wisata.detail');
Route::get('/kategori-wisata', [App\Http\Controllers\KategoriWisataController::class, 'index'])->name('kategori-wisata.index');
Route::get('/objek-wisata/alam', [App\Http\Controllers\ObjekWisataController::class, 'indexAlam'])->name('objek-wisata.alam.index');
Route::get('/objek-wisata/budaya', [App\Http\Controllers\ObjekWisataController::class, 'indexBudaya'])->name('objek-wisata.budaya.index');
Route::get('/objek-wisata/kreatif', [App\Http\Controllers\ObjekWisataController::class, 'indexKreatif'])->name('objek-wisata.kreatif.index');

//paket wisata
Route::get('/paket-wisata', [App\Http\Controllers\PaketWisataController::class, 'index'])->name('paket-wisata.index');
Route::get('/paket-wisata/{id}/detail', [App\Http\Controllers\PaketWisataController::class, 'detail'])->name('paket-wisata.detail');


// User Produk UMKM
Route::get('/produk-umkm', [App\Http\Controllers\UserProdukUmkmController::class, 'index'])->name('produk-umkm.index');
Route::get('/produk-umkm/makanan', [App\Http\Controllers\UserProdukUmkmController::class, 'makananIndex'])->name('produk-umkm.makanan.index');
Route::get('/produk-umkm/sovenir', [App\Http\Controllers\UserProdukUmkmController::class, 'sovenirIndex'])->name('produk-umkm.sovenir.index');
Route::get('/produk-umkm/pakaian', [App\Http\Controllers\UserProdukUmkmController::class, 'pakaianIndex'])->name('produk-umkm.pakaian.index');
Route::get('/produk-umkm/all', [App\Http\Controllers\UserProdukUmkmController::class, 'allIndex'])->name('produk-umkm.all.index');
Route::get('/produk-umkm/{id}/detail', [App\Http\Controllers\UserProdukUmkmController::class, 'detailProdukUmkm'])->name('produk-umkm.detail');



//Route Fasilitas
Route::get('/fasilitas', [App\Http\Controllers\FasilitasController::class, 'index'])->name('user.fasilitas.index');

//peginapan
Route::get('/fasilitas/penginapan', [App\Http\Controllers\PenginapanController::class, 'index'])->name('user.fasilitas.penginapan.index');
Route::get('/fasilitas/penginapan/{id}/detail', [App\Http\Controllers\PenginapanController::class, 'detail'])->name('user.fasilitas.penginapan.detail');
// Route::get('/fasilitas/penginapan', [App\Http\Controllers\PenginapanController::class, 'index'])->name('fasilitas.penginapan.index');

//bank
Route::get('/fasilitas/bank', [App\Http\Controllers\FasilitasController::class, 'bankIndex'])->name('user.fasilitas.bank.index');
Route::get('/fasilitas/bank/{id}/detail', [App\Http\Controllers\FasilitasController::class, 'detailBank'])->name('user.fasilitas.bank.detail');

//kesehatan
Route::get('/fasilitas/kesehatan', [App\Http\Controllers\FasilitasController::class, 'kesehatanIndex'])->name('user.fasilitas.kesehatan.index');
Route::get('/fasilitas/kesehatan/{id}/detail', [App\Http\Controllers\FasilitasController::class, 'detailKesehatan'])->name('user.fasilitas.kesehatan.detail');

//rumah makan
Route::get('/fasilitas/rumah-makan', [App\Http\Controllers\FasilitasController::class, 'rumahMakanIndex'])->name('user.fasilitas.rumah-makan.index');
Route::get('/fasilitas/rumah-makan/{id}/detail', [App\Http\Controllers\FasilitasController::class, 'detailrumahMakan'])->name('user.fasilitas.rumah-makan.detail');

//rumah ibadah
Route::get('/fasilitas/rumah-ibadah', [App\Http\Controllers\FasilitasController::class, 'rumahIbadahIndex'])->name('user.fasilitas.rumah-ibadah.index');
Route::get('/fasilitas/rumah-ibadah/{id}/detail', [App\Http\Controllers\FasilitasController::class, 'detailrumahIbadah'])->name('user.fasilitas.rumah-ibadah.detail');

Route::post('/addTestimoni', [App\Http\Controllers\TestimoniController::class, 'addTestimoni'])->name('user.testimoni.store');


Route::get('/test', function(){
    return view('test');
});



Route::group(['middleware' => ['auth','role:1']], function(){
    Route::prefix('admin')->group(function(){
    //admin beranda
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

    //admin beranda
    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'adminView'])->name('admin.profil');
    Route::get('/profil/store', [App\Http\Controllers\ProfilController::class, 'adminStore'])->name('admin.profil.store');
    Route::post('/profil/create', [App\Http\Controllers\ProfilController::class, 'createProfil'])->name('admin.profil.create');
    Route::get('/profil/{id}/edit', [App\Http\Controllers\ProfilController::class, 'editProfil'])->name('admin.profil.edit');
    Route::put('/profil/{id}/update', [App\Http\Controllers\ProfilController::class, 'updateProfil'])->name('admin.profil.update');
    //admin Destinasi
    Route::get('/destinasi', [App\Http\Controllers\AdminDestinasiController::class, 'AdminDestinationView'])->name('AdminDestinationView');
    Route::get('/destinasiStore', [App\Http\Controllers\AdminDestinasiController::class, 'AdminDestinationStore'])->name('AdminDestinationStore');
    Route::post('/createDestinasi', [App\Http\Controllers\AdminDestinasiController::class, 'StoreDestination'])->name('destinasi.store');
    Route::delete('/destinasi/{destinasi}', [App\Http\Controllers\AdminDestinasiController::class, 'softDelete'])->name('destinasi.softDelete');
    Route::get('/destinasi/{id}/edit', [App\Http\Controllers\AdminDestinasiController::class, 'edit'])->name('destinasi.edit');
    Route::put('/destinasi/{id}', [App\Http\Controllers\AdminDestinasiController::class, 'update'])->name('destinasi.update');

    //admin berita wisata
    Route::get('/beritaWisata', [App\Http\Controllers\AdminBeritaWisataController::class, 'AdminBeritaWisataView'])->name('berita-wisata.index');
    Route::get('/beritaWisataStore', [App\Http\Controllers\AdminBeritaWisataController::class, 'AdminBeritaWisataStore'])->name('berita-wisata.store');
    Route::post('/createBeritaWisata', [App\Http\Controllers\AdminBeritaWisataController::class, 'CreateBeritaWisata'])->name('berita-wisata.create');
    Route::delete('/berita-wisata/{id}', [App\Http\Controllers\AdminBeritaWisataController::class, 'deleteBeritaWisata'])->name('berita-wisata.delete');
    Route::get('/berita-wisata/{id}/edit', [App\Http\Controllers\AdminBeritaWisataController::class, 'editBeritaWisata'])->name('berita-wisata.edit');
    Route::put('/berita-wisata/{id}', [App\Http\Controllers\AdminBeritaWisataController::class, 'updateBeritaWisata'])->name('berita-wisata.update');

    //admin atraksi wisata
    Route::get('/atraksiWisata', [App\Http\Controllers\AdminAtraksiWisataController::class, 'AdminAtraksiWisataView'])->name('atraksi-wisata.index');
    Route::get('/atraksiWisataStore', [App\Http\Controllers\AdminAtraksiWisataController::class, 'AdminAtraksiWisataStore'])->name('atraksi-wisata.store');
    Route::post('/createAtraksiWisata', [App\Http\Controllers\AdminAtraksiWisataController::class, 'CreateAtraksiWisata'])->name('atraksi-wisata.create');
    Route::delete('/atraksi-wisata/{id}', [App\Http\Controllers\AdminAtraksiWisataController::class, 'deleteAtraksiWisata'])->name('atraksi-wisata.delete');
    Route::get('/atraksi-wisata/{id}/edit', [App\Http\Controllers\AdminAtraksiWisataController::class, 'editAtraksiWisata'])->name('atraksi-wisata.edit');
    Route::put('/atraksi-wisata/{id}', [App\Http\Controllers\AdminAtraksiWisataController::class, 'updateAtraksiWisata'])->name('atraksi-wisata.update');

    //admin fasilitas kesehatan
    Route::get('/fasilitasKesehatan', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'AdminFasilitasKesehatanView'])->name('fasilitas-kesehatan.index');
    Route::get('/fasilitasKesehatanStore', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'AdminFasilitasKesehatanStore'])->name('fasilitas-kesehatan.store');
    Route::post('/createFasilitasKesehatan', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'AdminFasilitasKesehatanCreate'])->name('fasilitas-kesehatan.create');
    Route::delete('/fasilitas-kesehatan/{id}', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'deleteFasilitasKesehatan'])->name('fasilitas-kesehatan.delete');
    Route::get('/fasilitas-kesehatan/{id}/edit', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'editFasilitasKesehatan'])->name('fasilitas-kesehatan.edit');
    Route::put('/fasilitas-kesehatan/{id}', [App\Http\Controllers\AdminFasilitasKesehatanController::class, 'updateFasilitasKesehatan'])->name('fasilitas-kesehatan.update');

    //admin fasilitas bank
    Route::get('/bank', [App\Http\Controllers\AdminBankController::class, 'AdminBankView'])->name('admin.bank.index');
    Route::get('/bankStore', [App\Http\Controllers\AdminBankController::class, 'AdminBankStore'])->name('admin.bank.store');
    Route::post('/createBank', [App\Http\Controllers\AdminBankController::class, 'AdminBankCreates'])->name('admin.bank.create');
    Route::delete('/bank/{id}', [App\Http\Controllers\AdminBankController::class, 'deleteBank'])->name('admin.bank.delete');
    Route::get('/bank/{id}/edit', [App\Http\Controllers\AdminBankController::class, 'editBank'])->name('admin.bank.edit');
    Route::put('/bank/{id}', [App\Http\Controllers\AdminBankController::class, 'updateBank'])->name('admin.bank.update');

    //admin rumah makan
    Route::get('/rumahMakan', [App\Http\Controllers\AdminRumahMakanController::class, 'AdminRumahMakanView'])->name('admin.rumahMakan.index');
    Route::get('/rumahMakanStore', [App\Http\Controllers\AdminRumahMakanController::class, 'AdminRumahMakanStore'])->name('admin.rumahMakan.store');
    Route::post('/createRumahMakan', [App\Http\Controllers\AdminRumahMakanController::class, 'AdminRumahMakanCreates'])->name('admin.rumahMakan.create');
    Route::delete('/rumahMakan/{id}', [App\Http\Controllers\AdminRumahMakanController::class, 'deleteRumahMakan'])->name('admin.rumahMakan.delete');
    Route::get('/rumahMakan/{id}/edit', [App\Http\Controllers\AdminRumahMakanController::class, 'editRumahMakan'])->name('admin.rumahMakan.edit');
    Route::put('/rumahMakan/{id}', [App\Http\Controllers\AdminRumahMakanController::class, 'updateRumahMakan'])->name('admin.rumahMakan.update');

    // admin rumah ibadah
    Route::get('/rumahIbadah', [App\Http\Controllers\AdminRumahIbadahController::class, 'AdminRumahIbadahView'])->name('admin.rumahIbadah.index');
    Route::get('/rumahIbadahStore', [App\Http\Controllers\AdminRumahIbadahController::class, 'AdminRumahIbadahStore'])->name('admin.rumahIbadah.store');
    Route::post('/createRumahIbadah', [App\Http\Controllers\AdminRumahIbadahController::class, 'AdminRumahIbadahCreates'])->name('admin.rumahIbadah.create');
    Route::delete('/rumahIbadah/{id}', [App\Http\Controllers\AdminRumahIbadahController::class, 'deleteRumahIbadah'])->name('admin.rumahIbadah.delete');
    Route::get('/rumahIbadah/{id}/edit', [App\Http\Controllers\AdminRumahIbadahController::class, 'editRumahIbadah'])->name('admin.rumahIbadah.edit');
    Route::put('/rumahIbadah/{id}', [App\Http\Controllers\AdminRumahIbadahController::class, 'updateRumahIbadah'])->name('admin.rumahIbadah.update');

    //admin penginapan
    Route::get('/penginapan', [App\Http\Controllers\AdminPenginapanController::class, 'AdminPenginapanView'])->name('admin.penginapan.index');
    Route::get('/penginapanStore', [App\Http\Controllers\AdminPenginapanController::class, 'AdminPenginapanStore'])->name('admin.penginapan.store');
    Route::post('/createPenginapan', [App\Http\Controllers\AdminPenginapanController::class, 'AdminPenginapanCreate'])->name('admin.penginapan.create');
    Route::delete('/penginapan/{id}', [App\Http\Controllers\AdminPenginapanController::class, 'deletePenginapan'])->name('admin.penginapan.delete');
    Route::get('/penginapan/{id}/edit', [App\Http\Controllers\AdminPenginapanController::class, 'editPenginapan'])->name('admin.penginapan.edit');
    Route::put('/penginapan/{id}', [App\Http\Controllers\AdminPenginapanController::class, 'updatePenginapan'])->name('admin.penginapan.update');

    //admin paket wisata
    Route::get('/paketWisata', [App\Http\Controllers\AdminPaketWisataController::class, 'AdminPaketWisataView'])->name('admin.paketWisata.index');
    Route::get('/paketWisataStore', [App\Http\Controllers\AdminPaketWisataController::class, 'AdminPaketWisataStore'])->name('admin.paketWisata.store');
    Route::post('/createPaketWisata', [App\Http\Controllers\AdminPaketWisataController::class, 'AdminPaketWisataCreate'])->name('admin.paketWisata.create');
    Route::delete('/paket-wisata/{id}', [App\Http\Controllers\AdminPaketWisataController::class, 'deletePaketWisata'])->name('admin.paketWisata.delete');
    Route::get('/paket-wisata/{id}/edit', [App\Http\Controllers\AdminPaketWisataController::class, 'editPaketWisata'])->name('admin.paketWisata.edit');
    Route::put('/paket-wisata/{id}', [App\Http\Controllers\AdminPaketWisataController::class, 'updatePaketWisata'])->name('admin.paketWisata.update');


    //admin produk umkm (viewAll)
    Route::get('/produk-umkm/makanan', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmMakananView'])->name('admin.umkm.makanan.index');
    Route::get('/produk-umkm/sovenir', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmSovenirView'])->name('admin.umkm.sovenir.index');
    Route::get('/produk-umkm/pakaian', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmPakaianView'])->name('admin.umkm.pakaian.index');

    //admin produk umkm (store)
    Route::get('/produk-umkm/makanan/store', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmMakananStore'])->name('admin.umkm.makanan.store');
    Route::get('/produk-umkm/sovenir/store', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmSovenirStore'])->name('admin.umkm.sovenir.store');
    Route::get('/produk-umkm/pakaian/store', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmPakaianStore'])->name('admin.umkm.pakaian.store');

    //admin produk umkm (edit)
    Route::get('/produk-umkm/makanan/{id}/edit', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmMakananEdit'])->name('admin.umkm.makanan.edit');
    Route::get('/produk-umkm/sovenir/{id}/edit', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmSovenirEdit'])->name('admin.umkm.sovenir.edit');
    Route::get('/produk-umkm/pakaian/{id}/edit', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmPakaianEdit'])->name('admin.umkm.pakaian.edit');

    //admin produk umkm (create)
    Route::post('/produk-umkm-makanan/create', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmMakananCreate'])->name('admin.umkm.makanan.create');
    Route::post('/produk-umkm-sovenir/create', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmSovenirCreate'])->name('admin.umkm.sovenir.create');
    Route::post('/produk-umkm-pakaian/create', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmPakaianCreate'])->name('admin.umkm.pakaian.create');

    //admin produk umkm (delete)
    Route::delete('/produk-umkm/delete/{id}', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmDelete'])->name('admin.umkm.delete');
    
    //admin produk umkm (update)
    Route::put('/produk-umkm-makanan/{id}/update', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmMakananUpdate'])->name('admin.umkm.makanan.update');
    Route::put('/produk-umkm-sovenir/{id}/update', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmSovenirUpdate'])->name('admin.umkm.sovenir.update');
    Route::put('/produk-umkm-pakaian/{id}/update', [App\Http\Controllers\ProdukUmkmController::class, 'AdminUmkmPakaianUpdate'])->name('admin.umkm.pakaian.update');

    });
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');