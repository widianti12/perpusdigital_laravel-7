<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bukucontroller;
use App\Http\Controllers\kategoribukucontroller;
use App\Http\Controllers\peminjamancontroller;
use App\Http\Controllers\ulasanbukucontroller;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\HomeController;

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

Route::get('', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/main', 'maincontroller@index');

// Route::get('/search', [maincontroller::class, 'search'])->name('search');
Route::get('/search', [bukucontroller::class, 'search'])->name('search');

Route::group(['middleware' => 'role:Petugas,Admin'], function() {

    Route::get('kategori',[kategoribukucontroller::class,'index']);
    route::get('kategori/create', [kategoribukucontroller::class,'create']);
    route::post('kategori/store',[kategoribukucontroller::class,'store']);
    route::delete('/kategori/destroy/{id}', [kategoribukucontroller::class,'destroy']);

    Route::get('buku',[bukucontroller::class,'index']);
    Route::get('buku/create', [bukucontroller::class,'create']);
    Route::post('buku/store',[bukucontroller::class,'store']);
    Route::get('buku/edit/{id}',[bukucontroller::class,'edit']);
    Route::put('buku/update/{id}',[bukucontroller::class,'update']);
    Route::delete('/buku/destroy/{id}', [bukucontroller::class,'destroy']);
    Route::get('buku/show/{id}', [bukucontroller::class,'show']);
    Route::get('/downloadpdfbuku',[bukucontroller::class,'downloadpdfbuku']);

});


Route::group(['middleware' => 'role:User'], function() {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('buku/show/{id}', [bukucontroller::class,'show']);

Route::get('koleksi', 'koleksipribadicontroller@koleksi')->name('koleksi');
Route::post('koleksi/add/{buku}', 'koleksipribadicontroller@addkoleksi')->name('koleksi.add');
Route::delete('/koleksi/destroy/{id}', 'koleksipribadicontroller@destroy')->name('koleksi.destroy');


Route::get('peminjaman/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->name('peminjaman.pinjam');
Route::post('/peminjaman/store', [PeminjamanController::class, 'peminjamanbuku'])->name('peminjaman.store');
Route::post('/peminjaman', [PeminjamanController::class, 'pengembalianbuku'])->name('peminjaman.kembalikan');

Route::get('/historypeminjaman', 'PeminjamanController@historypeminjaman')->name('peminjaman.historypeminjaman');
Route::get('/historypengembalian', 'PeminjamanController@historypengembalian')->name('peminjaman.historypengembalian');

Route::get('/downloadpdfpeminjaman',[PeminjamanController::class,'downloadpdfpeminjaman']);

Route::get('ulasan/create/{id}', [ulasanbukucontroller::class, 'create'])->name('ulasan.create');
Route::post('ulasan/store', [ulasanbukucontroller::class, 'store'])->name('ulasan.store')->middleware('auth');

});
