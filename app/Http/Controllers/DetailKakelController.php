<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakel;
use App\Models\DetailKakel;
use App\Models\Anggota;
use DB;
use Session;
use Alert;
use Validator;

class DetailKakelController extends Controller
{
    public function tampil_detail_kakel($id)
    {
        $kakel = Kakel::find($id);
        Session::put('halaman_url', request()->fullUrl());

        $det_kakel = DetailKakel::join('kakel', 'kakel.id', '=' , 'detail_kakel.id_kakel')
        ->join('anggota', 'anggota.id', '=' , 'detail_kakel.id_anggota')
        ->where('id_kakel', $id)
        ->get(['anggota.nama','detail_kakel.id', 'detail_kakel.sts_keluarga']);

        return view('detailkakel.index', compact('kakel','det_kakel'));
    }

    public function tambah_anggota_kakel($id)
    {
        $kakel = Kakel::find($id);

        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('detail_kakel')
            ->whereRaw('detail_kakel.id_anggota = anggota.id');
         })->get();

        return view('detailkakel.create', compact('kakel','anggota'));
    }

    public function simpan_anggota(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_anggota' => 'required',
            'sts_keluarga' => 'required',
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Anggota keluarga wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DetailKakel::create([
            'id_kakel' => $request->input('id_kakel'),
            'id_anggota' => $request->input('id_anggota'),
            'sts_keluarga' => $request->input('sts_keluarga')
        ]);

        // redirect dengan pesan sukses
        Alert::success('Data berhasil disimpan!', '');

        if(session('halaman_url')){
            return Redirect(session('halaman_url'));
        }
    }

    public function tombol_kembali()
    {
        if(session('halaman_url')){
            return Redirect(session('halaman_url'));
        }
    }

    public function tampil_ubah_anggota($id)
    {
        $det_kakel = DetailKakel::find($id);

        return view('detailkakel.edit', compact('det_kakel'));
    }

    public function perbarui_anggota(Request $request, $id)
    {
        $det_kakel = DetailKakel::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'sts_keluarga' => 'required',
        ],
        // Pesan
        [
            // Required
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $det_kakel->sts_keluarga = $request->input('sts_keluarga');

        $det_kakel->update();

        // redirect dengan pesan sukses
        Alert::success('Data berhasil diubah!', '');

        if(session('halaman_url')){
            return Redirect(session('halaman_url'));
        }
    }

    public function hapus_anggota($id)
    {
        DetailKakel::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
