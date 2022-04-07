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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Anggota
Route::group(['prefix' => '/anggota'], function() {
    Route::get('/index', 'App\Http\Controllers\AnggotaController@tampil_anggota')->name('anggota.index');
    Route::get('/create', 'App\Http\Controllers\AnggotaController@tambah_anggota')->name('anggota.tambah');
    Route::post('/save', 'App\Http\Controllers\AnggotaController@simpan_anggota')->name('anggota.simpan');
    Route::get('/edit/{id}', 'App\Http\Controllers\AnggotaController@tampil_ubah_anggota')->name('anggota.tampil_ubah');
    Route::put('/update/{id}', 'App\Http\Controllers\AnggotaController@perbarui_anggota')->name('anggota.simpan_perbarui');
    Route::post('/delete/{id}', 'App\Http\Controllers\AnggotaController@hapus_anggota')->name('anggota.hapus');

    // IndoRegion
    Route::post('/kabupaten', 'App\Http\Controllers\AnggotaController@ambil_kabupaten')->name('ambilKabupaten');
    Route::post('/kecamatan', 'App\Http\Controllers\AnggotaController@ambil_kecamatan')->name('ambilKecamatan');
    Route::post('/kelurahan', 'App\Http\Controllers\AnggotaController@ambil_kelurahan')->name('ambilKelurahan');
});

// Pelayanan Kategorial
Route::group(['prefix' => '/pelkat'], function() {
    Route::get('/index', 'App\Http\Controllers\PelkatController@tampil_pelkat')->name('pelkat.index');
    Route::get('/create', 'App\Http\Controllers\PelkatController@tambah_pelkat')->name('pelkat.create');
    Route::post('/save', 'App\Http\Controllers\PelkatController@simpan_pelkat')->name('pelkat.simpan');
    Route::post('/delete/{id}', 'App\Http\Controllers\PelkatController@hapus_pelkat')->name('pelkat.hapus');

    // Detail Pelayanan Kategorial
    Route::get('/detail/index/{id}', 'App\Http\Controllers\DetailPelkatController@tampil_detail_pelkat')->name('detailpelkat.index');
    Route::get('/detail/create/{id}', 'App\Http\Controllers\DetailPelkatController@tambah_anggota_pelkat')->name('detailpelkat.create');
    Route::post('/detail/save', 'App\Http\Controllers\DetailPelkatController@simpan_anggota')->name('detailpelkat.simpan');
    Route::post('/detail/delete/{id}', 'App\Http\Controllers\DetailPelkatController@hapus_anggota')->name('detailpelkat.hapus');
});

// Sektor Wilayah
Route::group(['prefix' => '/sekwil'], function() {
    Route::get('/index', 'App\Http\Controllers\SekwilController@tampil_sekwil')->name('sekwil.index');
    Route::get('/create', 'App\Http\Controllers\SekwilController@tambah_sekwil')->name('sekwil.create');
    Route::post('/save', 'App\Http\Controllers\SekwilController@simpan_sekwil')->name('sekwil.simpan');
    Route::post('/delete/{id}', 'App\Http\Controllers\SekwilController@hapus_sekwil')->name('sekwil.hapus');
});

// Kartu Keluarga
Route::group(['prefix' => '/kakel'], function() {
    Route::get('/index', 'App\Http\Controllers\KakelController@tampil_kakel')->name('kakel.index');
    Route::get('/create', 'App\Http\Controllers\KakelController@tambah_kakel')->name('kakel.create');
    Route::post('/save', 'App\Http\Controllers\KakelController@simpan_kakel')->name('kakel.simpan');
    Route::post('/delete/{id}', 'App\Http\Controllers\KakelController@hapus_kakel')->name('kakel.hapus');

    // Detail Kartu Keluarga
    Route::get('/detail/index/{id}', 'App\Http\Controllers\DetailKakelController@tampil_detail_kakel')->name('detailkakel.index');
    Route::get('/detail/create/{id}', 'App\Http\Controllers\DetailKakelController@tambah_anggota_kakel')->name('detailkakel.create');
    Route::post('/detail/save', 'App\Http\Controllers\DetailKakelController@simpan_anggota')->name('detailkakel.simpan');
    Route::post('/detail/delete/{id}', 'App\Http\Controllers\DetailKakelController@hapus_anggota')->name('detailkakel.hapus');
});

// Pusat Unduh
Route::group(['prefix' => '/laporan'], function() {
    Route::get('/index', 'App\Http\Controllers\LaporanController@tampil_laporan')->name('laporan.index');
});

// Pengguna
Route::group(['prefix' => '/pengguna'], function() {
    Route::get('/index', 'App\Http\Controllers\PenggunaController@tampil_pengguna')->name('pengguna.index');
    Route::get('/edit', 'App\Http\Controllers\PenggunaController@ubah_pengguna')->name('pengguna.ubah_profil');
    Route::get('/edit/pengguna/{id}', 'App\Http\Controllers\PenggunaController@ubah_pengguna_semua')->name('pengguna.ubah_pengguna');
});
