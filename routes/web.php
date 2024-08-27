<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\JenisArsipController;
use App\Http\Controllers\admin\JenisBeritaController;
use App\Http\Controllers\admin\KontakController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ArsipController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\MediaBeritaController;
use App\Http\Controllers\admin\MediaProfilController;
use App\Http\Controllers\admin\KomentarBeritaController;
use App\Http\Controllers\admin\PidioController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\depan\MukaController;
use App\Http\Controllers\depan\ArsipsController;
use App\Http\Controllers\depan\SontaksController;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','namespace'],function(){
Route::resource('/admin', AdminController::class);
Route::resource('/slide', SlideController::class);
Route::resource('/profil', ProfilController::class);
Route::resource('/video', PidioController::class); 
Route::resource('/jenisberita', JenisBeritaController::class);
Route::resource('/jenisarsip', JenisArsipController::class);
Route::resource('/berita', BeritaController::class);
Route::resource('/arsip', ArsipController::class); 
Route::resource('/kontak', KontakController::class); 
Route::resource('/profil/{media_profil}/mepro',MediaProfilController::class);
Route::resource('/berita/{media_berita}/meber', MediaBeritaController::class);
Route::resource('/berita/{berita}/komentar',KomentarBeritaController::class);
Route::get('/{id?}/users', [AdminController::class, 'profil'])->name('aprof');
Route::get('/{id?}/edits', [AdminController::class, 'eprof'])->name('eprof');
Route::put('/{id?}/rubahs', [AdminController::class, 'uprof'])->name('uprof');

Route::put('/berita/{id?}/publish', [BeritaController::class, 'publishit'])->name('beritashit');
	Route::get('/berita/pdf', [BeritaController::class, 'beritaallpdmf'])->name('beritaallpdf');
	Route::get('/baca-beritapdf/{id?}/{slug}', [BeritaController::class, 'genPDF'])->name('detberitapdf');
	Route::get('/berita-pdf', [BeritaController::class, 'generatePDF'])->name('jog');
	Route::put('/berita/{id?}/unpublish', [BeritaController::class, 'unpublishit'])->name('unberitashit');
	Route::get('/baca-berita/{id?}/{slug}', [BeritaController::class, 'adeber'])->name('adeber');
Route::get('/berita-publish', [BeritaController::class,'pablis'])->name('pablis');
Route::get('/berita-unpublish', [BeritaController::class,'unpablis'])->name('unpablis');
 Route::put('/video/{id?}/publish', [PidioController::class,'publishit'])->name('videoshit');
 Route::put('/video/{id?}/unpublish', [PidioController::class,'unpublishit'])->name('unvideoshit');
Route::put('/arsip/{id?}/unpublish', [ArsipController::class,'unpublishit'])->name('unpublishit');
Route::put('/arsip/{id?}/publish', [ArsipController::class,'publishit'])->name('publishit');
Route::get('/baca-arsip/{id?}/{slug}',[ArsipController::class,'arsipsip'])->name('arsipsip');


});
Route::get('/', [MukaController::class,'index'])->name('beranda');
Route::get('/video', [MukaController::class, 'pidio'])->name('pidio');
Route::get('/profil', [MukaController::class, 'profil'])->name('profil');
Route::get('/berita', [MukaController::class, 'berall'])->name('berall');
Route::get('/arsip', [ArsipsController::class, 'index'])->name('arsipall');
Route::get('/kontak', [SontaksController::class, 'index'])->name('pesans');
Route::post('/kontak/save/', [SontaksController::class, 'saves'])->name('kontak.save');
Route::get('/berita/{ket?}/{ket2?}',[MukaController::class, 'berall'])->name('berall');
Route::get('/arsip/{ket?}/{ket2?}',[ArsipsController::class, 'index'])->name('arsipall');
Route::get('/baca-berita/{id?}/{slug}',[MukaController::class, 'deber'])->name('deber');
Route::get('/baca-arsip/{id?}/{slug}',[ArsipsController::class, 'arsips'])->name('arsips');
Route::post('/komentar/{id}/{idkomentar?}',[MukaController::class,'komentarBerita'])->name('berita.komentar');