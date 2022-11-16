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

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', function () {
    return view('login');
});

Auth::routes();

// Home atau dashboard
Route::group(['prefix' => '/dashboard'], function() {
    Route::get('', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    // Anggota
    Route::get('/anggota', 'App\Http\Controllers\HomeController@anggota')->name('dashboard.anggota');

    // Pelkat
    Route::get('/pelkat', 'App\Http\Controllers\HomeController@pelkat')->name('dashboard.pelkat');
});

// Anggota
Route::group(['prefix' => '/anggota'], function() {
    Route::get('/index', 'App\Http\Controllers\AnggotaController@tampil_anggota')->name('anggota.index');
    Route::get('/create', 'App\Http\Controllers\AnggotaController@tambah_anggota')->name('anggota.tambah');
    Route::post('/save', 'App\Http\Controllers\AnggotaController@simpan_anggota')->name('anggota.simpan');
    Route::get('/detail/{id}', 'App\Http\Controllers\AnggotaController@tampil_detail_anggota')->name('anggota.tampil_detail');
    Route::get('/edit/{id}', 'App\Http\Controllers\AnggotaController@tampil_ubah_anggota')->name('anggota.tampil_ubah');
    Route::put('/update/{id}', 'App\Http\Controllers\AnggotaController@perbarui_anggota')->name('anggota.simpan_perbarui');
    Route::post('/delete/{id}', 'App\Http\Controllers\AnggotaController@hapus_anggota')->name('anggota.hapus');
    Route::get('/pdf', 'App\Http\Controllers\AnggotaController@cetak_semua_pdf')->name('anggota.download_semua');
    Route::get('/pdf/{id}', 'App\Http\Controllers\AnggotaController@cetak_satu_pdf')->name('anggota.download_satu');
});

// Pelayanan Kategorial
Route::group(['prefix' => '/pelkat'], function() {
    Route::get('/index', 'App\Http\Controllers\PelkatController@tampil_pelkat')->name('pelkat.index');
    Route::get('/create', 'App\Http\Controllers\PelkatController@tambah_pelkat')->name('pelkat.create');
    Route::post('/save', 'App\Http\Controllers\PelkatController@simpan_pelkat')->name('pelkat.simpan');
    Route::get('/edit/{id}', 'App\Http\Controllers\PelkatController@tampil_ubah_pelkat')->name('pelkat.tampil_ubah');
    Route::put('/update/{id}', 'App\Http\Controllers\PelkatController@perbarui_pelkat')->name('pelkat.simpan_perbarui');
    Route::post('/delete/{id}', 'App\Http\Controllers\PelkatController@hapus_pelkat')->name('pelkat.hapus');
    Route::get('/pdf/{id}', 'App\Http\Controllers\PelkatController@cetak_satu_pdf')->name('pelkat.download_satu');

    // Detail Pelayanan Kategorial
    Route::get('/detail/index/{id}', 'App\Http\Controllers\DetailPelkatController@tampil_detail_pelkat')->name('detailpelkat.index');
    Route::get('/detail/create/{id}', 'App\Http\Controllers\DetailPelkatController@tambah_anggota_pelkat')->name('detailpelkat.create');
    Route::post('/detail/save', 'App\Http\Controllers\DetailPelkatController@simpan_anggota')->name('detailpelkat.simpan');
    Route::get('/detail//kembali', 'App\Http\Controllers\DetailPelkatController@tombol_kembali')->name('detailpelkat.tombol_kembali');
    Route::get('/detail//edit/{id}', 'App\Http\Controllers\DetailPelkatController@tampil_ubah_anggota')->name('detailpelkat.tampil_ubah');
    Route::put('/detail//update/{id}', 'App\Http\Controllers\DetailPelkatController@perbarui_anggota')->name('detailpelkat.simpan_perbarui');
    Route::post('/detail/delete/{id}', 'App\Http\Controllers\DetailPelkatController@hapus_anggota')->name('detailpelkat.hapus');
});

// Sektor Wilayah
Route::group(['prefix' => '/sekwil'], function() {
    Route::get('/index', 'App\Http\Controllers\SekwilController@tampil_sekwil')->name('sekwil.index');
    Route::get('/create', 'App\Http\Controllers\SekwilController@tambah_sekwil')->name('sekwil.create');
    Route::post('/save', 'App\Http\Controllers\SekwilController@simpan_sekwil')->name('sekwil.simpan');
    Route::get('/edit/{id}', 'App\Http\Controllers\SekwilController@tampil_ubah_sekwil')->name('sekwil.tampil_ubah');
    Route::put('/update/{id}', 'App\Http\Controllers\SekwilController@perbarui_sekwil')->name('sekwil.simpan_perbarui');
    Route::post('/delete/{id}', 'App\Http\Controllers\SekwilController@hapus_sekwil')->name('sekwil.hapus');
});

// Kartu Keluarga
Route::group(['prefix' => '/kakel'], function() {
    Route::get('/index', 'App\Http\Controllers\KakelController@tampil_kakel')->name('kakel.index');
    Route::get('/create', 'App\Http\Controllers\KakelController@tambah_kakel')->name('kakel.create');
    Route::post('/save', 'App\Http\Controllers\KakelController@simpan_kakel')->name('kakel.simpan');
    Route::get('/edit/{id}', 'App\Http\Controllers\KakelController@tampil_ubah_kakel')->name('kakel.tampil_ubah');
    Route::put('/update/{id}', 'App\Http\Controllers\KakelController@perbarui_kakel')->name('kakel.simpan_perbarui');
    Route::post('/delete/{id}', 'App\Http\Controllers\KakelController@hapus_kakel')->name('kakel.hapus');
    Route::get('/pdf', 'App\Http\Controllers\KakelController@cetakPDF')->name('kakel.download_pdf');
    Route::get('/pdf/sekwil1', 'App\Http\Controllers\KakelController@cetak_sekwil1_PDF')->name('kakel.download_sekwil1_pdf');
    Route::get('/pdf/sekwil2', 'App\Http\Controllers\KakelController@cetak_sekwil2_PDF')->name('kakel.download_sekwil2_pdf');
    Route::get('/pdf/{id}', 'App\Http\Controllers\KakelController@cetak_satu_pdf')->name('kakel.download_satu');

    // Detail Kartu Keluarga
    Route::get('/detail/index/{id}', 'App\Http\Controllers\DetailKakelController@tampil_detail_kakel')->name('detailkakel.index');
    Route::get('/detail/create/{id}', 'App\Http\Controllers\DetailKakelController@tambah_anggota_kakel')->name('detailkakel.create');
    Route::get('/detail//kembali', 'App\Http\Controllers\DetailKakelController@tombol_kembali')->name('detailkakel.tombol_kembali');
    Route::get('/detail//edit/{id}', 'App\Http\Controllers\DetailKakelController@tampil_ubah_anggota')->name('detailkakel.tampil_ubah');
    Route::put('/detail//update/{id}', 'App\Http\Controllers\DetailKakelController@perbarui_anggota')->name('detailkakel.simpan_perbarui');
    Route::post('/detail/save', 'App\Http\Controllers\DetailKakelController@simpan_anggota')->name('detailkakel.simpan');
    Route::post('/detail/delete/{id}', 'App\Http\Controllers\DetailKakelController@hapus_anggota')->name('detailkakel.hapus');
});

// Pusat Unduhan
// Route::group(['prefix' => '/unduh'], function() {
//     Route::get('/index', 'App\Http\Controllers\UnduhanController@tampil_unduh')->name('unduh.index');
// });

// Laporan


// Pengguna
// Route::group(['prefix' => '/pengguna'], function() {
//     Route::get('/index', 'App\Http\Controllers\PenggunaController@tampil_pengguna')->name('pengguna.index');
//     Route::get('/create', 'App\Http\Controllers\PenggunaController@tambah_pengguna')->name('pengguna.create');
//     Route::post('/save', 'App\Http\Controllers\PenggunaController@simpan_pengguna')->name('pengguna.simpan');
//     Route::get('/edit/{id}', 'App\Http\Controllers\PenggunaController@tampil_ubah_pengguna')->name('pengguna.tampil_ubah');
//     Route::put('/update/{id}', 'App\Http\Controllers\PenggunaController@perbarui_pengguna')->name('pengguna.simpan_perbarui');
//     Route::get('/detail/{id}', 'App\Http\Controllers\PenggunaController@tampil_detail_pengguna')->name('pengguna.tampil_detail');
//     Route::post('/delete/{id}', 'App\Http\Controllers\PenggunaController@hapus_pengguna')->name('pengguna.hapus');
//     Route::get('/pdf', 'App\Http\Controllers\PenggunaController@cetak_semua_pdf')->name('pengguna.download_semua');
// });

// Profile
Route::group(['prefix' => '/profile'], function() {
    Route::get('', 'App\Http\Controllers\ProfileController@tampil_profile')->name('profile.tampil_profile');
    Route::put('/update', 'App\Http\Controllers\ProfileController@perbarui_profile')->name('profile.simpan_perbarui');
});
