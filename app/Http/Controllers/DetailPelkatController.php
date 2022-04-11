<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelkat;
use App\Models\DetailPelkat;
use App\Models\Anggota;
use DB;
use Session;
Use Alert;
use Validator;

class DetailPelkatController extends Controller
{
    public function tampil_detail_pelkat($id)
    {
        $pelkat = Pelkat::find($id);
        Session::put('halaman_url', request()->fullUrl());

        $det_pelkat = DetailPelkat::join('pelkat', 'pelkat.id', '=' , 'detail_pelkat.id_pelkat')
        ->join('anggota', 'anggota.id', '=' , 'detail_pelkat.id_anggota')
        ->where('id_pelkat', $id)
        ->get(['anggota.nama','detail_pelkat.id', 'detail_pelkat.pengurus']);

        return view('detailpelkat.index', compact('pelkat','det_pelkat'));
    }

    public function tambah_anggota_pelkat($id)
    {
        $pelkat = Pelkat::find($id);

        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('detail_pelkat')
            ->whereRaw('detail_pelkat.id_anggota = anggota.id');
         })->get();

        return view('detailpelkat.create', compact('pelkat','anggota'));
    }

    public function simpan_anggota(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_anggota' => 'required',
            'pengurus' => 'required',
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Anggota pelkat wajib diisi!',
            'pengurus.required' => 'Jabatan pengurus wajib diisi!',
        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DetailPelkat::create([
            'id_pelkat' => $request->input('id_pelkat'),
            'id_anggota' => $request->input('id_anggota'),
            'pengurus' => $request->input('pengurus')
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
        $det_pelkat = DetailPelkat::find($id);

        return view('detailpelkat.edit', compact('det_pelkat'));
    }

    public function perbarui_anggota(Request $request, $id)
    {
        $det_pelkat = DetailPelkat::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'pengurus' => 'required',
        ],
        // Pesan
        [
            // Required
            'pengurus.required' => 'Jabatan pengurus wajib diisi!',
        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $det_pelkat->pengurus = $request->input('pengurus');

        $det_pelkat->update();

        // redirect dengan pesan sukses
        Alert::success('Data berhasil diubah!', '');
        if(session('halaman_url')){
            return Redirect(session('halaman_url'));
        }
    }

    public function hapus_anggota($id)
    {
        DetailPelkat::find($id)->delete();
        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
