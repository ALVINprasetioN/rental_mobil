<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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
Route::middleware(['admin'])->group(function(){
    Route::get('/create/mobil',[MobilController::class,'create'])->name('create_mobil');
    Route::post('/create/mobil',[MobilController::class,'create'])->name('create_mobil');
    Route::post('/create/stor',[MobilController::class,'kirim_fots'])->name('mobil_store');
});
Route::patch('/edit/kondisi/mobil/trm',[SewaController::class,'tersewa_trm'])->name('tersewa-trm');
Route::patch('/edit/kondisi/mobil/tlk',[SewaController::class,'tersewa_tlk'])->name('tersewa-tlk');

Route::patch('/denda/form',[SewaController::class,'denda_form'])->name('denda_form');
Route::patch('/denda/lunas',[SewaController::class,'denda_lunas'])->name('denda_lunas');

Route::delete('/hapus/{mobil}',[MobilController::class,'delete'])->name('hapus_mobil');
Route::get('/show/admin',[PenyewaController::class, "show"])->name('show');

Route::get('/admin/sewa',[PenyewaController::class,'diboking'])->name('admin_sewa');
Route::get('/admin/tersewa',[PenyewaController::class,'tersewa'])->name('admin_tersewa');
Route::get('/admin/terima',[PenyewaController::class,'terima'])->name('admin_terima');
Route::get('/admin/denda',[PenyewaController::class,'denda'])->name('admin_denda');
Route::get('/admin/selesai',[PenyewaController::class,'selesai'])->name('admin_selesai');

Route::get('/pesanan/waiting',[PenyewaController::class,'waiting'])->name('pesanan_waiting');
Route::get('/pesanan/disewa',[PenyewaController::class,'pesanan_disewa'])->name('pesanan_disewa');
Route::get('/pesanan/dikembalikan',[PenyewaController::class,'pesanan_dikembalikan'])->name('pesanan_dikembalikan');
Route::patch('/pesanan/disewa',[MobilController::class,'kembalikan_disewa'])->name('kembalikan_disewa');
Route::patch('/pesanan/denda',[MobilController::class,'denda_sewa'])->name('denda_sewa');
Route::patch('/pesanan/denda/store',[MobilController::class,'denda_sewa_store'])->name('denda_sewa_store');

Route::get('/',[PenyewaController::class,'index'])->name('index');
Route::get('/login',[PenyewaController::class,'login'])->name('login');
Route::get('/home',[PenyewaController::class,'home'])->name('home');
Route::get('/sewa/{mobil}',[SewaController::class,'sewa'])->name('sewa');
Route::post('/sewa/stor',[SewaController::class,'proses_sewa'])->name('sewa_stor');
Route::get('/home',[MobilController::class,'show'])->name('show_car');
Route::post('/home',[PenyewaController::class,'home'])->name('home');
Auth::routes();

